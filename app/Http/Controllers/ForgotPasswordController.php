<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Mot de passe oublié',
            'sidebar' => false
        ];

        return view('auth.forgetPassword', compact('page'));
    }

    public function store(Request $request)
    {
        
    }
}
