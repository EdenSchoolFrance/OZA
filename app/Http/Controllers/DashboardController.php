<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $this->verifLogin();

        $page = [
            'title' => 'Présentation de la structure',
            'sidebar' => 'structure',
            'sub_sidebar' => 'presentation'
        ];

        return view('app.dashboard.index', compact('page'));
    }

    public function home(){
        $this->verifLogin();

        $page = [
            'title' => 'Bienvenue '.session()->get('auth.first-name').' '.session()->get('auth.last-name'),
            'sidebar' => 'home',
        ];

        return view('app.dashboard.home', compact('page'));
    }
}
