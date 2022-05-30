<?php

namespace App\Http\Controllers\Admin;

use App\Models\Danger;
use App\Models\Reflection;
use App\Models\SdDanger;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DangerController extends Controller
{
    public function index()
    {

        $page = [
            'title' => 'Danger (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'danger'
        ];

        $dangers = Danger::all();

        return view('admin.danger.index', compact('page','dangers'));
    }

    public function create()
    {

        $page = [
            'title' => 'Créé un danger (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'danger'
        ];

        return view('admin.danger.create', compact('page'));
    }

    public function edit($id_danger)
    {

        $page = [
            'title' => 'Modifier un danger (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'danger'
        ];

        $danger = Danger::find($id_danger);

        return view('admin.danger.edit', compact('page','danger'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'info_danger' => 'required',
            'reflection' => 'required|array'
        ]);

        $danger = new Danger();
        $danger->id = uniqid();
        $danger->name = $request->name;
        $danger->info = $request->info_danger;
        $danger->save();

        foreach ($request->reflection as $reflection){

            $ref = new Reflection();
            $ref->id = uniqid();
            $ref->name = $reflection;
            $ref->danger()->associate($danger);
            $ref->save();

        }

        return back()->with('status', 'Le danger a bien été enregisté !');
    }

    public function update(Request $request, $id_danger) {

        $request->validate([
            'name' => 'required',
            'info_danger' => 'required',
            'reflection' => 'required|array'
        ]);

        $danger = Danger::find($id_danger);

        if (!$danger) return back()->with('status','Un problème est survenue')->with('status_type','danger');

        $danger->reflections()->delete();

        $danger->name = $request->name;
        $danger->info = $request->info_danger;
        $danger->save();

        foreach ($request->reflection as $reflection){

            $ref = new Reflection();
            $ref->id = uniqid();
            $ref->name = $reflection;
            $ref->danger()->associate($danger);
            $ref->save();

        }

        return back()->with('status', 'Le danger a bien été enregisté !');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $danger = Danger::find($request->id);

        if (!$danger) return back()->with('status','Un problème est survenue')->with('status_type','danger');
        $danger->delete();

        return back()->with('status', 'L\'unité de travail a bien été supprimé !');
    }

}
