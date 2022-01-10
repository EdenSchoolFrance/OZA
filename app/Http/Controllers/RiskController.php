<?php

namespace App\Http\Controllers;

use App\Models\SdDanger;
use App\Models\SdRestraint;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function index($id, $id_danger)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Evaluation des risques professionnels',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = SdDanger::find($id_danger);

        return view('app.risk.index', compact('page', 'single_document','danger'));
    }

    public function create($id, $id_danger)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque',
            'link_back' => route('risk.index', [$id,$id_danger]),
            'text_back' => 'Retour à l’évaluation des risques',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = SdDanger::find($id_danger);

        return view('app.risk.create', compact('page', 'single_document','danger'));
    }

    public function store(Request $request, $id, $id_sd_danger, $id_work_unit = null){

        $single_document = $this->checkSingleDocument($id);
        $sd_danger = SdDanger::find($id_sd_danger);
        if (!$sd_danger) abort(404);
        $workUnit = SdWorkUnit::find($id_work_unit);

        $request->validate([
            'name_risk' => 'required',
            'frequency' => 'required',
            'probability' => 'required',
            'gravity' => 'required',
            'gender' => 'required',
            'restraint' => 'required|array',
            'restraint_proposed' => 'required|array',
        ]);

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $request->name_risk;
        $sd_risk->frequency = $request->frequency;
        $sd_risk->probability = $request->probability;
        $sd_risk->gravity = $request->gravity;
        $sd_risk->impact = $request->gender;
        $sd_risk->sd_danger()->associate($sd_danger);
        if ($workUnit) $sd_risk->sd_work_unit()->associate($workUnit);
        $sd_risk->save();

        foreach ($request->restraint as $restraint){
            $restraint = explode('|', $restraint);
            $sd_restraint = new SdRestraint();
            $sd_restraint->id = uniqid();
            $sd_restraint->name = $restraint[3];
            $sd_restraint->technical = $restraint[0];
            $sd_restraint->organizational = $restraint[1];
            $sd_restraint->human = $restraint[2];
            $sd_restraint->exist = true;
            $sd_restraint->sd_risk()->associate($sd_risk);
            $sd_restraint->save();
        }

        foreach ($request->restraint_proposed as $restraint){

            $sd_restraint = new SdRestraint();
            $sd_restraint->id = uniqid();
            $sd_restraint->name = $restraint;
            $sd_restraint->exist = false;
            $sd_restraint->sd_risk()->associate($sd_risk);
            $sd_restraint->save();
        }

        return redirect()->route('risk.index', [$single_document->id, $sd_danger->id]);

    }
}
