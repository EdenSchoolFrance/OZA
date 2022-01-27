<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        $page = [
            'title' => 'Modification du mot de passe',
            'sidebar' => false
        ];

        return view('auth.resetPassword', compact('page', 'token'));
    }

    public function store(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed'
        ]);

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $token])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('status', 'Token invalide !')->with('status_type', 'danger');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('login')->with('status', 'Votre mot de passe a été changé !');
    }
}
