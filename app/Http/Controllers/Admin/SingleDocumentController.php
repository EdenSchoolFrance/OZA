<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Client;
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

        return redirect()->route('admin.client.edit', [$client->id])->with('status', 'Le document unique a bien été créé !');
    }
}
