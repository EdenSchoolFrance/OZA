<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $page = [
            'title' => 'Bienvenue ' . Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'sidebar' => 'home',
            'sub_sidebar' => ''
        ];

        $single_documents = Auth::user()->single_documents->where('archived', 0);

        if (count($single_documents) == 1) {
            return redirect()->route('dashboard', [$single_documents->first()->id]);
        }

        return view('app.dashboard.home', compact('page', 'single_documents'));
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
