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
        $single_document = $this->checkSingleDocument($id);

        $users = User::whereHas('single_documents', function ($q) use ($id) {
            $q->where('id', $id);
        })->get();

        $page = [
            'title' => 'Utilisateurs',
            'infos' => 'Seul le responsable du DU peut valider la finalisation du DU',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.index', compact('page', 'single_document','users'));
    }

    public function create($id)
    {
        $single_document = $this->checkSingleDocument($id);
        $roles_array = ['EXPERT'];

        $user_manager = User::whereHas('client', function ($q) use ($single_document) {
                $q->where('id', $single_document->client->id);
            })->whereHas('role', function ($q) {
                $q->where('permission', 'MANAGER');
            })->first();

        if (Auth::user()->hasPermission('MANAGER')) {
            array_push($roles_array, 'ADMIN');
        }

        if ($user_manager) {
            array_push($roles_array, 'MANAGER');
        }

        $users = User::whereHas('client', function ($q) use ($single_document) {
                $q->where('id', $single_document->client->id);
            })->whereDoesntHave('single_documents', function ($q) use ($single_document) {
                $q->where('id', $single_document->id);
            })->get();
        $roles = Role::whereNotIn('permission', $roles_array)->get();

        $page = [
            'title' => 'Ajouter un utilisateur',
            'url_back' => route('user.client.index', [$id]),
            'text_back' => 'Retour vers les utilisateurs',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.create', compact('page', 'single_document', 'roles', 'users'));
    }

    public function store(Request $request, $id)
    {
        $single_document = $this->checkSingleDocument($id);

        if ($request->type == "add") {
            $request->validate([
                'user' => 'required|exists:users,id'
            ]);

            $user = User::where('id', $request->user)->whereHas('client', function ($q) use ($single_document) {
                    $q->where('id', $single_document->client->id);
                })->whereDoesntHave('single_documents', function ($q) use ($single_document) {
                    $q->where('id', $single_document->id);
                })->first();

            if (!$user) {
                return back()->with('status', 'Une erreur est survenue !')->with('status_type', 'danger')->withInput();
            }

            $user->single_documents()->attach($single_document);

            return redirect()->route('user.client.index', [$single_document->id])->with('status', 'L\'utilisateur a bien été ajouté !');
        } elseif ($request->type == "create") {
            $request->validate([
                'lastname' => 'required_without:user',
                'firstname' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required',
                'post' => 'required',
                'role' => 'required|exists:roles,id',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ]);

            $roles_array = ['EXPERT'];
            $user_manager = User::whereHas('client', function ($q) use ($single_document) {
                    $q->where('id', $single_document->client->id);
                })->whereHas('role', function ($q) {
                    $q->where('permission', 'MANAGER');
                })->first();

            if (Auth::user()->hasPermission('MANAGER')) {
                array_push($roles_array, 'ADMIN');
            }

            if ($user_manager) {
                array_push($roles_array, 'MANAGER');
            }

            $role = Role::where('id', $request->role)->whereNotIn('permission', $roles_array)->first();

            if (!$role) {
                return back()->with('status', 'Une erreur est survenue !')->with('status_type', 'danger')->withInput();
            }

            $user = new User();
            $user->id = uniqid();
            $user->lastname = $request->lastname;
            $user->firstname = $request->firstname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->post = $request->post;
            $user->password = $request->password;
            $user->role()->associate($role);
            $user->client()->associate($single_document->client->id);
            $user->save();

            if ($role->permission == "ADMIN") {
                $user->single_documents()->attach($single_document->client->single_documents);
            }else{
                $user->single_documents()->attach($single_document->id);
            }

            return redirect()->route('user.client.index', [$single_document->id])->with('status', 'L\'utilisateur a bien été créé !');
        }
    }

    public function edit($id, $user_id)
    {
        $single_document = $this->checkSingleDocument($id);
        $roles_array = ['EXPERT'];

        $user = User::where('id', $user_id)->whereHas('single_documents', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->first();

        if (!Auth::user()->hasAccess('oza')) {
            if (!$user || (!$user->hasPermission('ADMIN') && !Auth::user()->hasPermission('MANAGER')) || ($user->id == Auth::user()->id)) {
                abort(404);
            }
        }

        $user_manager = User::whereHas('client', function ($q) use ($single_document) {
                $q->where('id', $single_document->client->id);
            })->whereHas('role', function ($q) {
                $q->where('permission', 'MANAGER');
            })->first();

        if (Auth::user()->hasPermission('MANAGER')) {
            array_push($roles_array, 'ADMIN');
        }

        if ($user_manager && $user != $user_manager) {
            array_push($roles_array, 'MANAGER');
        }

        if (!Auth::user()->hasAccess('oza')) {
            $roles = Role::whereNotIn('permission', $roles_array)->get();
        }else{
            $roles = Role::all();
        }
        $page = [
            'title' => 'Modification de l\'utilisateur : ' . $user->lastname . ' ' . $user->firstname,
            'url_back' => route('user.client.index', [$id]),
            'text_back' => 'Retour vers les utilisateurs',
            'sidebar' => 'structure',
            'sub_sidebar' => 'users'
        ];

        return view('app.user.edit', compact('page', 'user', 'roles','single_document'));
    }

    public function update(Request $request, $id, $user_id)
    {
        $single_document = $this->checkSingleDocument($id);

        $user = User::where('id', $user_id)->whereHas('single_documents', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->first();
        if (!Auth::user()->hasAccess('oza')) {
            if (!$user || (!$user->hasPermission('ADMIN') && !Auth::user()->hasPermission('MANAGER')) || ($user->id == Auth::user()->id)) {
                abort(404);
            }
        }

        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
            'post' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,id',
            'password' => 'nullable|confirmed'
        ]);

        $roles_array = ['EXPERT'];
        $user_manager = User::whereHas('client', function ($q) use ($single_document) {
                $q->where('id', $single_document->client->id);
            })->whereHas('role', function ($q) {
                $q->where('permission', 'MANAGER');
            })->first();

        if (Auth::user()->hasPermission('MANAGER')) {
            array_push($roles_array, 'ADMIN');
        }

        if ($user_manager && $user != $user_manager) {
            array_push($roles_array, 'MANAGER');
        }

        $role = Role::where('id', $request->role)->whereNotIn('permission', $roles_array)->first();

        if (!$role) {
            return back()->with('status', 'Une erreur est survenue !')->with('status_type', 'danger')->withInput();
        }

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->phone = $request->phone;
        $user->post = $request->post;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = $request->password;
            $user->first_connection = 1;
        }

        $user->role()->associate($request->role);
        $user->save();

        return redirect()->route('user.client.index', [$single_document->id])->with('status', 'L\'utilisateur a bien été modifié !');
    }

    public function delete(Request $request, $id)
    {
        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'id' => 'required'
        ]);

        $user = User::where('id', $request->id)->whereHas('single_documents', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->first();

        if (!$user || ($user->hasPermission('ADMIN') && Auth::user()->hasPermission('MANAGER')) || ($user->id == Auth::user()->id)) {
            return back()->with('status', 'Une erreur est survenue !')->with('status_type', 'danger');
        }

        if (count($user->single_documents) > 1) {
            $user->single_documents()->detach($single_document->id);

            return back()->with('status', 'L\'utilisateur a bien été supprimé de ce document unique !');
        } else {
            $user->delete();

            return back()->with('status', 'L\'utilisateur a bien été supprimé !');
        }
    }
}
