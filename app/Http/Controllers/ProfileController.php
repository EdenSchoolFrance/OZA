<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit($id = null)
    {
        if ($id) {
            $single_document = $this->checkSingleDocument($id);
        } else {
            $single_document = null;
        }

        $page = [
            'title' => 'Mon profil',
            'sidebar' => "profil",
            'sub_sidebar' => "profil"
        ];

        return view('auth.profile', compact('page', 'single_document'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
            'post' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        Auth::user()->lastname = $request->lastname;
        Auth::user()->firstname = $request->firstname;
        Auth::user()->phone = $request->phone;
        Auth::user()->post = $request->post;
        Auth::user()->email = $request->email;
        Auth::user()->save();

        return back()->with('status', 'Votre profile a été mis à jour !');
    }
}
