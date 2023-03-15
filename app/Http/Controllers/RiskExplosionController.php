<?php

namespace App\Http\Controllers;

use App\Models\DangerLevel;
use App\Models\RestraintExplosion;
use App\Models\SdRestraintExplosion;
use App\Models\SdRiskExplosion;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;

class RiskExplosionController extends Controller
{
    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Evaluation du risque d\'explosion',
            'infos' => null,
            'sidebar' => 'risk_explosion'
        ];

        $sd_risks = SdRiskExplosion::where('single_document_id', $single_document->id)->get();

        return view('app.risk_explosion.index', compact('page', 'single_document', 'sd_risks'));
    }

    public function create($id){

        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque explosion',
            'url_back' => route('risk.explosion.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques d\'explosion',
            'sidebar' => 'risk_explosion'
        ];

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_explosion = RestraintExplosion::all();

        $danger_level = DangerLevel::all();

        return view('app.risk_explosion.create', compact('page', 'single_document','works_units','restraints_explosion', 'danger_level'));

    }


    public function action($id){

        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Plan d’action de réduction des risques d\'explosion',
            'sidebar' => 'action_plan',
            'sub_sidebar' => "risk_explosion"
        ];

        $sd_risks = SdRiskExplosion::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->get();


        return view('app.risk_explosion.restraint', compact('page', 'single_document', 'sd_risks'));
    }

    public function action_store(Request $request,$id){

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'id' => 'required',
            'date_restraint' => 'required',
            'decision_restraint' => 'required'
        ]);

        $sd_restraint = SdRestraintExplosion::find($request->id);

        if (!$sd_restraint) abort(404);

        $sd_restraint->date = $request->date_restraint;
        $sd_restraint->comment = $request->decision_restraint;
        $sd_restraint->save();

        return back()->with('status', 'La mesure a bien été mise à jour !');
    }
}
