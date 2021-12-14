<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('admin.users.index', compact('page', 'users'));
    }

    public function create()
    {
        $page = [
            'title' => 'Ajouter un utilisateur',
            'sidebar' => 'users',
            'sub_sidebar' => 'create',
        ];

        $roles = Role::where('permission', 'EXPERT')->orWhere('permission', 'ADMIN')->get();

        return view('admin.users.create', compact('page', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required|exists:roles,id',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->id = uniqid();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->oza = 1;
        $user->role()->associate($request->role);
        $user->save();

        return redirect()->route('admin.user')->with('status', 'L\'utilisateur a bien été créé !');
    }

    public function edit(User $user)
    {
        $page = [
            'title' => 'Modification de l\'utilisateur : ' . $user->lastname . ' ' . $user->firstname,
            'sidebar' => 'users',
            'sub_sidebar' => '',
        ];

        $roles = Role::where('permission', 'EXPERT')->orWhere('permission', 'ADMIN')->get();

        return view('admin.users.edit', compact('page', 'user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,id',
        ]);

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->role()->associate($request->role);
        $user->save();

        return redirect()->route('admin.user')->with('status', 'L\'utilisateur a bien été modifié !');
    }
}
