<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        $page = [
            'title' => 'Identification',
            'sidebar' => false,
            'nav' => false
        ];

        return view('auth.login', compact('page'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect()->intended('')->withSuccess('Signed in');
        }
        return redirect()->intended('login')->withErrors('Login Fail');
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('login')->withSuccess('Logout success');
    }
}
