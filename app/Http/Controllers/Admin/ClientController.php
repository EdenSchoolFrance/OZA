<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SingleDocument;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Liste des utilisateurs',
            'sidebar' => 'clients',
            'sub_sidebar' => 'list',
        ];

        $clients = Client::all();

        return view('admin.client.index', compact('page', 'clients'));
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
            'password' => 'required|confirmed',
        ]);

        $admin_client = Role::where('permission', 'ADMIN')->first();
        $file = $request->file('logo');

        $client = new Client();
        $client->id = uniqid();
        $client->name = $request->name_enterprise;
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

        Storage::putFileAs('/client/logo', $file, $client->id . '.' . $file->extension());

        return redirect()->route('admin.client.edit', [$client->id])->with('status', 'Le client a bien été créé !');
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
        $single_documents = SingleDocument::where('client_id', $client->id)->paginate(1);

        return view('admin.client.edit', compact('page', 'client', 'experts', 'dangers', 'single_documents'));
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
            Storage::putFileAs('/client/logo', $file, $client->id . '.' . $file->extension());
        }

        $client->name = $request->name_enterprise;
        $client->client_number = $request->client_number;
        $client->adress = $request->adress;
        $client->additional_adress = $request->additional_adress;
        $client->city_zipcode = $request->city_zipcode;
        $client->city = $request->city;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->post = $request->post;
        $client->expert()->associate($request->expert);
        $client->save();

        return redirect()->route('admin.client.edit', [$client->id])->with('status', 'Le client a bien été mis à jours !');
    }
}
