<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'email' => 'required|email|exists:users',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $token = Str::random(64);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->queue(new ResetPassword(["token" => $token]));

        return back()->with('status', 'Un mail vous a été envoyé !');
    }
}
