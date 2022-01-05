<?php

namespace App\Http\Controllers\Client;

use App\Models\SingleDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index($id)
    {
        $sd = $this->checkSingleDocument($id);
        $users = User::whereHas('single_documents', function ($q) use ($id) {
            $q->where('id', $id);
        })->get();
        $page = [
            'title' => 'Utilisateurs',
            'infos' => 'Seul le responsable du DU peut valider la finalisation du DU',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.index', compact('page', 'sd','users'));
    }

    public function create($id)
    {
        $sd = $this->checkSingleDocument($id);
        $roles = Role::where('permission', '!=', 'EXPERT')->get();

        $page = [
            'title' => 'Ajouter un utilisateur',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.create', compact('page', 'sd','roles'));
    }

    public function store(Request $request, $id)
    {
        $sd = $this->checkSingleDocument($id);
        $admin = Role::where('permission', 'ADMIN');

        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
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
        $user->role()->associate($request->role);
        $user->client()->associate($sd->client->id);
        $user->save();
        if ($request->role === $admin){
            $user->single_documents()->attach($sd->client->single_documents->id);
        }else{
            $user->single_documents()->attach($sd->id);
        }

        return redirect()->route('user.client.index', [$sd->id])->with('status', 'L\'utilisateur a bien été créé !');
    }

    public function edit($id, User $user)
    {
        $sd = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Modification de l\'utilisateur : ' . $user->lastname . ' ' . $user->firstname,
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        $roles = Role::where('permission', '!=', 'EXPERT')->get();

        return view('app.user.edit', compact('page', 'user', 'roles','sd'));
    }

    public function update(Request $request, $id, User $user)
    {
        $sd = $this->checkSingleDocument($id);

        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
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

        return redirect()->route('user.client.index', [$sd->id])->with('status', 'L\'utilisateur a bien été modifié !');
    }
}
