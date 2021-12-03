<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index($id){

        $page = [
            'title' => 'Utilisateurs',
            'infos' => 'Seul le responsable du DU peut valider la finalisation du DU',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.index', compact('page','id'));
    }
}
