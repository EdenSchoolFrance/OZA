<?php

namespace App\Http\Controllers\Admin;

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
            'sub_sidebar' => 'listUser',
        ];

        $users = User::where('oza', 0)->get();

        return view('admin.users.index', compact('page', 'users'));
    }
}
