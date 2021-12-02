<?php

namespace App\Http\Controllers;

use App\Models\Single_document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($id){

        $page = [
            'title' => 'Présentation de la structure',
            'sidebar' => 'structure',
            'sub_sidebar' => 'presentation'
        ];

        $single = Single_document::find($id);
        if (!empty($single)){
            session(['du' => $id]);
            return view('app.dashboard.index', compact('page', 'single'));
        }
        return redirect()->route('dashboard.home');
    }

    public function home(){

        $page = [
            'title' => 'Bienvenue '.session()->get('auth.first-name').' '.session()->get('auth.last-name'),
            'nav' => 'nodrop',
            'sidebar' => 'home',
        ];

        return view('app.dashboard.home', compact('page'));
    }
}
