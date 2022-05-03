<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pack;
use App\Models\SingleDocument;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Liste des clients',
            'sidebar' => 'clients',
            'sub_sidebar' => 'list',
        ];

        $clients = Client::query();
        $filter = null;

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($_GET['filter']['client'] !== "") {
                $clients = $clients->where('name','LIKE','%' . $_GET['filter']['client'] . '%');
            }

            if ($_GET['filter']['status'] !== "") {
                if ($_GET['filter']['status'] == "in_progress") {
                    $clients = $clients->where('archived', 0);
                } elseif ($_GET['filter']['status'] == "archived") {
                    $clients = $clients->where('archived', 1);
                }
            }
        }

        $clients = $clients->paginate(50);

        return view('admin.client.index', compact('page', 'clients', 'filter'));
    }

    public function create()
    {
        $page = [
            'title' => 'Ajouter un client',
            'sidebar' => 'clients',
            'sub_sidebar' => 'create',
        ];

        $experts = User::where('oza', 1)->get();

        return view('admin.client.create', compact('page', 'experts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_enterprise' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png,svg',
            'client_number' => 'required',
            'adress' => 'required',
            'city_zipcode' => 'required',
            'city' => 'required',
            'expert' => 'required|exists:users,id',
            'firstname' => 'required',
            'lastname' => 'required',
            'post' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        $admin_client = Role::where('permission', 'ADMIN')->first();
        $file = $request->file('logo');

        $client = new Client();
        $client->id = uniqid();
        $client->name = $request->name_enterprise;
        $client->image_type = $file->extension();
        $client->client_number = $request->client_number;
        $client->adress = $request->adress;
        $client->additional_adress = $request->additional_adress;
        $client->city_zipcode = $request->city_zipcode;
        $client->city = $request->city;
        $client->expert()->associate($request->expert);
        $client->save();

        $user = new User();
        $user->id = uniqid();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->post = $request->post;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role()->associate($admin_client);
        $user->client()->associate($client->id);
        $user->save();

        Storage::makeDirectory('/public/'.$client->id);
        Storage::makeDirectory('/public/'.$client->id.'/logo');
        Storage::makeDirectory('/public/'.$client->id.'/du');

        Storage::putFileAs('/public/'.$client->id.'/logo', $file, $client->id . '.' . $file->extension());

        return redirect()->route('admin.client.edit', [$client->id, 'tab' => 'du'])->with('status', 'Le client a bien été créé !');
    }

    public function edit(Client $client)
    {
        $page = [
            'title' => 'Client : ' . $client->name,
            'sidebar' => 'clients',
            'sub_sidebar' => '',
        ];

        $experts = User::where('oza', 1)->get();
        $dangers = Danger::all();
        $packs = Pack::all();
        $single_documents = SingleDocument::where('client_id', $client->id)->paginate(15);

        if (isset($_GET['tab']) && ($_GET['tab'] == 'info' || $_GET['tab'] == 'du')) {
            $tab = $_GET['tab'];
        } else {
            $tab = 'info';
        }

        return view('admin.client.edit', compact('page', 'client', 'experts', 'dangers', 'single_documents', 'packs', 'tab'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name_enterprise' => 'required',
            'logo' => 'nullable|mimes:jpg,jpeg,png,svg',
            'client_number' => 'required',
            'adress' => 'required',
            'city_zipcode' => 'required',
            'city' => 'required',
            'expert' => 'required|exists:users,id',
            'password' => 'nullable|confirmed',
        ]);

        $file = $request->file('logo');

        if ($file) {
            Storage::delete(Storage::allFiles('/public/'.$client->id.'/logo'));
            Storage::putFileAs('/public/'.$client->id.'/logo', $file, $client->id . '.' . $file->extension());
        }

        $client->name = $request->name_enterprise;
        if ($file) $client->image_type = $file->extension();
        $client->client_number = $request->client_number;
        $client->adress = $request->adress;
        $client->additional_adress = $request->additional_adress;
        $client->city_zipcode = $request->city_zipcode;
        $client->city = $request->city;
        $client->expert()->associate($request->expert);
        $client->save();

        return redirect()->route('admin.client.edit', [$client->id])->with('status', 'Le client a bien été mis à jours !');
    }

    public function archive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $client = Client::find($request->id);

        if ($client) {
            $client->archived = true;
            $client->save();
        }

        return back()->with('status', 'Le client a bien été archivé !');
    }

    public function unarchive(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $client = Client::find($request->id);

        if ($client) {
            $client->archived = false;
            $client->save();
        }

        return back()->with('status', 'Le client a bien été désarchivé !');
    }

    public function delete(Client $client)
    {
        Storage::deleteDirectory('/public/'.$client->id);

        $client->delete();

        return redirect()->route('admin.clients')->with('status', 'Le client a bien été supprimé !');
    }
}
