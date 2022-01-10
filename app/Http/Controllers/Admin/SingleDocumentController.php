<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pack;
use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use App\Models\SdDanger;
use Illuminate\Http\Request;
use App\Models\SingleDocument;
use App\Http\Controllers\Controller;

class SingleDocumentController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Liste des DU',
            'sidebar' => 'clients',
            'sub_sidebar' => 'single_document',
        ];

        $single_documents = SingleDocument::query();
        $filter = null;

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($_GET['filter']['client'] !== "") {
                $single_documents = $single_documents->where('name','LIKE','%' . $_GET['filter']['client'] . '%');
            }

            if ($_GET['filter']['status'] !== "") {
                if ($_GET['filter']['status'] == "in_progress") {
                    $single_documents = $single_documents->where('archived', 0);
                } elseif ($_GET['filter']['status'] == "archived") {
                    $single_documents = $single_documents->where('archived', 1);
                }
            }
        }

        $single_documents = $single_documents->paginate(50);

        return view('admin.single_document.index', compact('page', 'single_documents', 'filter'));
    }

    public function store(Request $request, Client $client)
    {
        $request->validate([
            'name_single_document' => 'required',
            'dangers' => 'required|array',
            'dangers.*' => 'exists:dangers,id'
        ]);

        $users = User::where('client_id', $client->id)->whereHas('role', function ($q) {
            $q->where('permission', 'ADMIN');
        })->get();

        $single_document = new SingleDocument();
        $single_document->id = uniqid();
        $single_document->name = $request->name_single_document;
        $single_document->client()->associate($client);
        $single_document->save();
        foreach ($users as $user) {
            $single_document->users()->attach($user);
        }

        foreach ($request->dangers as $danger) {
            $sd_danger = new SdDanger();
            $sd_danger->id = uniqid();
            $sd_danger->single_document()->associate($single_document);
            $sd_danger->danger()->associate($danger);
            $sd_danger->save();
        }

        return back()->with('status', 'Le document unique a bien été créé !');
    }

    public function edit(Client $client, SingleDocument $single_document)
    {
        $page = [
            'title' => 'Modification du document unique : ' . $single_document->name,
            'sidebar' => 'clients',
            'sub_sidebar' => '',
        ];

        $dangers = Danger::all();
        $packs = Pack::all();

        $sd = $single_document;

        return view('admin.single_document.edit', compact('page', 'sd', 'dangers', 'packs'));
    }

    public function update(Request $request, Client $client, SingleDocument $single_document)
    {
        $request->validate([
            'name_single_document' => 'required',
            'dangers' => 'required|array',
            'dangers.*' => 'exists:dangers,id'
        ]);

        $single_document->name = $request->name_single_document;
        $single_document->save();

        $dangers = SdDanger::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $dangers_request = $request->dangers;

        foreach ($dangers as $danger) {
            if (in_array($danger->danger_id, $dangers_request)) {
                unset($dangers_request[$danger->danger_id]);
            } else {
                $danger->delete();
            }
        }

        foreach ($dangers_request as $danger) {
            $sd_danger = new SdDanger();
            $sd_danger->id = uniqid();
            $sd_danger->single_document()->associate($single_document);
            $sd_danger->danger()->associate($danger);
            $sd_danger->save();
        }

        return back()->with('status', 'Le document unique a bien été mis à jour !');
    }

    public function archive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $single_document = SingleDocument::find($request->id);

        if ($single_document) {
            $single_document->archived = true;
            $single_document->save();
        }

        return back()->with('status', 'Le document unique a bien été archivé !');
    }

    public function unarchive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $single_document = SingleDocument::find($request->id);

        if ($single_document) {
            $single_document->archived = false;
            $single_document->save();
        }

        return back()->with('status', 'Le document unique a bien été désarchivé !');
    }

    public function delete(Client $client, SingleDocument $single_document)
    {
        $single_document->delete();

        return redirect()->route('admin.client.edit', [$client->id, 'tab' => 'du'])->with('status', 'Le document unique a bien été supprimé !');
    }
}
