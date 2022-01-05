<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Identification',
            'sidebar' => false,
            'nav' => false
        ];

        return view('auth.login', compact('page'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasAccess('oza')) {
                return redirect()->intended('/clients');
            } else {
                if (Auth::user()->client->archived) {
                    Auth::logout();

                    return back()->withErrors([
                        'password' => 'Vous ne pouvez pas vous connecter ! Contactez un administrateur si vous pensez que c\'est une erreur',
                    ]);
                }

                return redirect()->intended('');
            }
        }

        return back()->withErrors([
            'password' => 'Les identifiants de connexion ne sont pas valides.',
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
