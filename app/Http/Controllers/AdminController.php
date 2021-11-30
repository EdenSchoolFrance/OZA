<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $this->verifLogin();
        $this->verifPermAdmin();

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
        $this->verifLogin();
        $this->verifPermAdmin();

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
        $this->verifLogin();
        $this->verifPermAdmin();

        $page = [
            'title' => 'Ajouter un client',
            'sidebar' => 'clients',
            'sub_sidebar' => 'addClient',
            'oza' => true,
            'nav' => 'oza'
        ];

        return view('admin.client.add', compact('page'));
    }

    public function clientsAddStore(Request $request){
        $this->verifLogin();
        $this->verifPermAdmin();

        $request->validate([
            'name_enterprise' => 'required',
            'logo' => 'required',
            'client_oza' => 'required',
            'adress' => 'required',
            'city_zipcode' => 'required',
            'city' => 'required',
            'oza_expert' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'post' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required',
            'conf_password' => 'required'
        ]);

    }

    public function clientsDU(){
        $this->verifLogin();
        $this->verifPermAdmin();

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
