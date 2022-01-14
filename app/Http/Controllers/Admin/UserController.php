<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $page = [
            'title' => 'Liste des utilisateurs',
            'sidebar' => 'users',
            'sub_sidebar' => 'list',
        ];

        $users = User::where('oza', 1)->get();

        return view('admin.user.index', compact('page', 'users'));
    }

    public function create()
    {
        $page = [
            'title' => 'Ajouter un utilisateur',
            'sidebar' => 'users',
            'sub_sidebar' => 'create',
        ];

        $roles = Role::where('permission', 'EXPERT')->orWhere('permission', 'ADMIN')->get();

        return view('admin.user.create', compact('page', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:users',
            'phone' => ['required', 'regex:/^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$/'],
            'post' => 'required',
            'role' => 'required|exists:roles,id',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->id = uniqid();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->post = $request->post;
        $user->password = $request->password;
        $user->oza = 1;
        $user->role()->associate($request->role);
        $user->save();

        return redirect()->route('admin.users')->with('status', 'L\'utilisateur a bien été créé !');
    }

    public function edit(User $user)
    {
        if ($user->id == Auth::user()->id) {
            abort(404);
        }

        $page = [
            'title' => 'Modification de l\'utilisateur : ' . $user->lastname . ' ' . $user->firstname,
            'sidebar' => 'users',
            'sub_sidebar' => '',
        ];

        $roles = Role::where('permission', 'EXPERT')->orWhere('permission', 'ADMIN')->get();

        return view('admin.user.edit', compact('page', 'user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->id == Auth::user()->id) {
            abort(404);
        }
        
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => ['required', 'regex:/^(?:(?:(?:\+|00)33\D?(?:\D?\(0\)\D?)?)|0){1}[1-9]{1}(?:\D?\d{2}){4}$/'],
            'post' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,id',
        ]);

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->phone = $request->phone;
        $user->post = $request->post;
        $user->email = $request->email;
        $user->role()->associate($request->role);
        $user->save();

        return redirect()->route('admin.users')->with('status', 'L\'utilisateur a bien été modifié !');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if ($user && $user->id != Auth::user()->id) {
            $user->delete();
        }

        return back()->with('status', 'L\'utilisateur a bien été supprimé !');
    }
}
