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
            'sidebar' => false,
            'text_back' => 'Retour à la page de connexion',
            'url_back' => route('login')
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

        Mail::send('emails.resetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Réinitialisation du mot de passe');
        });

        return back()->with('status', 'Un mail vous a été envoyé !');
    }
}
