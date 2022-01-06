<?php

namespace App\Http\Controllers;

use App\Models\Single_document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $page = [
            'title' => 'Bienvenue ' . Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'nav' => 'nodrop',
            'sidebar' => 'home',
        ];

        if (count(Auth::user()->single_documents) == 1) {
            return redirect()->route('dashboard', [Auth::user()->single_documents->first()->id]);
        }

        return view('app.dashboard.home', compact('page'));
    }

    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Bienvenue ' . Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'sidebar' => 'dashboard',
            'sub_sidebar' => ''
        ];

        return view('app.dashboard.index', compact('page', 'single_document'));
    }
}
