<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
            'loginEmail' => 'required',
            'loginPass' => 'required'
        ]);
        if ($request->loginEmail === 'admin@oza.fr' && $request->loginPass === 'admin'){
            session(['auth' => [
                'first-name' => 'admin',
                'last-name' => 'oza',
                'perm' => 'admin'
            ]]);
            return redirect()->route('admin.user');
        }
        if ($request->loginEmail === 'client@oza.fr' && $request->loginPass === 'client'){
            session(['auth' => [
                'first-name' => 'client',
                'last-name' => 'oza',
                'perm' => 'client'
            ]]);
            return redirect()->route('dashboard.home');
        }
        session(['error' => true]);
        return back();
    }
    public function logout(){
        session()->forget('auth');
        return redirect()->route('auth.index');
    }

    // This function it's only for local developement
    public function bypass($role){
        if ($role === 'admin'){
            session(['auth' => [
                'first-name' => 'admin',
                'last-name' => 'oza',
                'perm' => 'admin'
            ]]);
            return redirect()->route('admin.user');
        }else if ($role === 'client'){
            session(['auth' => [
                'first-name' => 'client',
                'last-name' => 'oza',
                'perm' => 'client'
            ]]);
            return redirect()->route('dashboard.home');
        }else{
            abort(404);
        }
    }
}
