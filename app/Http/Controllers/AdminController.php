<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

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
