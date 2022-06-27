<?php

namespace App\Http\Controllers\Admin;

use App\Models\Danger;
use App\Models\DomainActivitie;
use App\Models\Restraint;
use App\Models\Risk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiskController extends Controller
{

    public function index()
    {
        $page = [
            'title' => 'Tous les risques (complétion)',
            'infos' => null,
            'sidebar' => 'help',
            'sub_sidebar' => 'risk'
        ];

        $risks = Risk::all();

        return view('admin.risk.index', compact('page', 'risks'));
    }

    public function create()
    {

        $page = [
            'title' => 'Créer un risque',
            'url_back' => route('admin.help.risk'),
            'text_back' => 'Retour à l’évaluation des risques',
            'sidebar' => 'help',
            'sub_sidebar' => 'risk'
        ];

        $domains = DomainActivitie::all();
        $dangers = Danger::all();

        if (!$domains || !$dangers) abort(404);


        return view('admin.risk.create', compact('page', 'domains','dangers'));
    }

    public function edit($id_risk)
    {
        $page = [
            'title' => 'Editer un risque (complétion)',
            'url_back' => route('admin.help.risk'),
            'text_back' => 'Retour à l’évaluation des risques',
            'sidebar' => 'help',
            'sub_sidebar' => 'risk'
        ];


        $risk = Risk::find($id_risk);
        $domains = DomainActivitie::all();
        $dangers = Danger::all();

        if (!$risk || !$domains || !$dangers) abort(404);

        return view('admin.risk.edit', compact('page','risk','domains','dangers'));
    }

    public function store(Request $request){

        $request->validate([
            'danger_risk' => 'required',
            'name_risk' => 'required',
            'domain_risk' => 'required',
            'frequency' => 'required',
            'probability' => 'required',
            'gravity' => 'required',
            'impact' => 'required',
            'restraint' => 'required|array'
        ]);

        $danger = Danger::find($request->danger_risk);
        $domain = DomainActivitie::find($request->domain_risk);

        if (!$domain || !$danger) return back()->with('status','Un problème est survenue')->with('status_type','danger');

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = $request->name_risk;
        $risk->frequency = $request->frequency;
        $risk->probability = $request->probability;
        $risk->gravity = $request->gravity;
        $risk->impact = $request->impact;
        $risk->danger()->associate($danger);
        $risk->domain_activitie()->associate($domain);
        $risk->save();

        foreach ($request->restraint as $res){
            $res = explode('|', $res);

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = $res[0];
            $restraint->risk()->associate($risk);
            $restraint->save();
        }

        return redirect()->route('admin.help.risk')->with('status', 'Le risque a bien été créé !');
    }


    public function update(Request $request, $id_risk){

        $request->validate([
            'danger_risk' => 'required',
            'name_risk' => 'required',
            'domain_risk' => 'required',
            'frequency' => 'required',
            'probability' => 'required',
            'gravity' => 'required',
            'impact' => 'required',
            'restraint' => 'required|array'
        ]);

        $domain = DomainActivitie::find($request->domain_risk);
        $danger = Danger::find($request->danger_risk);

        if (!$domain || !$danger) return back()->with('status','Un problème est survenue')->with('status_type','danger');

        $risk = Risk::find($id_risk);
        $risk->name = $request->name_risk;
        $risk->frequency = $request->frequency;
        $risk->probability = $request->probability;
        $risk->gravity = $request->gravity;
        $risk->impact = $request->impact;
        $risk->domain_activitie()->associate($domain);
        $risk->danger()->associate($request->danger_risk);
        $risk->save();

        $risk->restraint()->delete();

        foreach ($request->restraint as $restraint){
            $restraint = explode('|', $restraint);
            $sd_restraint = new Restraint();
            $sd_restraint->id = uniqid();
            $sd_restraint->name = $restraint[0];
            $sd_restraint->risk()->associate($risk);
            $sd_restraint->save();
        }

        return redirect()->route('admin.help.risk')->with('status', 'Le risque a bien été modifié !');
    }

    public function delete(Request $request){

        $request->validate([
            'id' => 'required'
        ]);

        $risk = Risk::find($request->id);
        if (!$risk) abort(404);

        $risk->delete();

        return back()->with('status', 'Le risque a bien été supprimé !');
    }

}
