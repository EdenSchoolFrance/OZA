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
            'title' => 'Mon profile',
            'sidebar' => null,
            'sub_sidebar' => null
        ];

        return view('auth.profile', compact('page', 'single_document'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => ['required', 'regex:/^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$/'],
            'post' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        Auth::user()->lastname = $request->lastname;
        Auth::user()->firstname = $request->firstname;
        Auth::user()->phone = $request->phone;
        Auth::user()->post = $request->post;
        Auth::user()->email = $request->email;
        Auth::user()->save();

        return back()->with('status', 'Votre profile a bien été mis à jours !');
    }
}
