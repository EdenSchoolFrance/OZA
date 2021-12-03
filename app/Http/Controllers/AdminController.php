<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){

        $page = [
            'title' => 'Liste des utilisateurs',
            'sidebar' => 'users',
            'sub_sidebar' => 'listUser',
            'oza' => true,
            'nav' => 'oza'
        ];

        return view('admin.users.index', compact('page'));
    }

    public function clients(){

        $page = [
            'title' => 'Liste des utilisateurs',
            'sidebar' => 'clients',
            'sub_sidebar' => 'listClient',
            'oza' => true,
            'nav' => 'oza'
        ];

        return view('admin.client.index', compact('page'));
    }

    public function clientsAdd(){

        $page = [
            'title' => 'Ajouter un client',
            'sidebar' => 'clients',
            'sub_sidebar' => 'addClient',
            'oza' => true,
            'nav' => 'oza'
        ];
        $experts = User::where('oza', 1)->get();

        return view('admin.client.add', compact('page','experts'));
    }

    public function clientsAddStore(Request $request){

        $request->validate([
            'name_enterprise' => 'required',
            'logo' => 'required',
            'client_oza' => 'required',
            'adress' => 'required',
            'city_zipcode' => 'required',
            'city' => 'required',
            'oza_expert' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'post' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'conf_password' => 'required'
        ]);

        if ($request->password !== $request->conf_password){
            return back();
        }

        $super_admin_client = Role::where('permission', 'SUPER_ADMIN')->first();


        $id = uniqid();
        $file = $request->file('logo');
        $file->move(base_path('public/logo'), $id.'.'.$file->getClientOriginalExtension());

        $client = new Client();
        $client->id = $id;
        $client->name = $request->name_enterprise;
        $client->client_number = $request->client_oza;
        $client->adress = $request->adress;
        if ($request->additional_adress) $client->additional_adress = $request->additional_adress;
        $client->city_zipcode = $request->city_zipcode;
        $client->city = $request->city;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->picture = $id.'.'.$file->getClientOriginalExtension();
        $client->save();
        $client->experts()->attach($request->oza_expert);


        $user = new User();
        $user->id = uniqid();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role()->associate($super_admin_client);
        $user->client()->associate($client);
        $user->save();




        return redirect()->route('admin.user');
    }

    public function clientsDU(){

        $page = [
            'title' => 'Liste des DU',
            'sidebar' => 'clients',
            'sub_sidebar' => 'listDu',
            'oza' => true,
            'nav' => 'oza'
        ];

        return view('admin.client.listDu', compact('page'));
    }

    public function unavailable(){
        $page = [
            'title' => 'Erreur 503',
            'sidebar' => false,
            'nav' => false
        ];

        return view('error.unavailable', compact('page'));
    }

}
