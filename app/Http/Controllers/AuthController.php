<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $page = [
            'title' => 'Identification',
            'sidebar' => false
        ];

        return view('auth.login', compact('page'));
    }

    public function login_store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->first_connection == null && Auth::user()->first_connection !== 0) {
                Auth::user()->first_connection = 1;
                Auth::user()->save();
            }

            if (Auth::user()->hasAccess('oza')) {
                return redirect()->route('admin.clients');
            } else {
                if (Auth::user()->client->archived) {
                    Auth::logout();

                    return back()->withErrors([
                        'password' => 'Vous ne pouvez pas vous connecter ! Contactez un administrateur si vous pensez que c\'est une erreur',
                    ]);
                }

                return redirect()->route('dashboard.home');
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

    public function firstAuth()
    {
        $page = [
            'title' => 'Première connexion',
            'sidebar' => false
        ];

        return view('auth.firstAuth', compact('page'));
    }

    public function firstAuth_store(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        Auth::user()->password = $request->password;
        Auth::user()->first_connection = 0;
        Auth::user()->save();

        return back();
    }
}
