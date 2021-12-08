<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $client_id = uniqid();
        $file = $request->file('logo');

        Storage::disk('public')->put('/logo/' . $client_id . '.' . $file->extension(), $file);

        $client = new Client();
        $client->id = $client_id;
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
        $client->save();
        $client->experts()->attach($request->expert);

        $user = new User();
        $user->id = uniqid();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role()->associate($admin_client);
        $user->client()->associate($client_id);
        $user->save();

        return redirect()->route('admin.user')->with('status', 'Le client a bien été créé !');
    }

    public function edit(Client $client)
    {
        $page = [
            'title' => 'Client : ' . $client->name,
            'sidebar' => 'clients',
            'sub_sidebar' => '',
        ];

        $experts = User::where('oza', 1)->get();

        return view('admin.client.edit', compact('page', 'client', 'experts'));
    }

    public function update(Request $request, Client $client)
    {
        var_dump('Update Client');

        die;
    }
}
