<?php

namespace App\Http\Controllers;

use App\Models\RestraintChemical;
use App\Models\SdEquipementChemical;
use App\Models\SdRestraintChemical;
use App\Models\SdRiskChemical;
use App\Models\SdWorkUnit;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class RiskChemicalController extends Controller
{
    public function index($id){
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Evaluation des risques chimiques',
            'sidebar' => 'risk_chemical'
        ];

        $sd_risks_chemicals = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document);
        });

        return view('app.risk_chemical.index', compact('page', 'single_document', 'sd_risks_chemicals'));
    }

    public function create($id){

        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque chimiques',
            'url_back' => route('risk.chemical.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques chimiques',
            'sidebar' => 'risk_chemical'
        ];

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_chemical = RestraintChemical::all();

        return view('app.risk_chemical.create', compact('page', 'single_document','works_units','restraints_chemical'));
    }

    public function store(Request $request,$id)
    {
        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'work_unit' => 'required',
            'name_risk' => 'required',
            'activity' => 'required',
            'n1' => 'required',
            'n2' => 'required',
            'n3' => 'required',
            'n4' => 'required',
            'n5' => 'required',
            'n6' => 'required',
            'n7' => 'required',
            'n8' => 'required',
            'n9' => 'required',
            'n10' => 'required',
            'date_fds' => 'required',
            'ventilation' => 'required',
            'concentration' => 'required',
            'time' => 'required',
            'protection' => 'required'
        ]);

        $sd_work_unit = SdWorkUnit::find($request->work_unit);

        if (!$sd_work_unit) abort(404);

        $sd_risk = new SdRiskChemical();
        $sd_risk->id = uniqid();
        $sd_risk->name = $request->name_risk;
        $sd_risk->activity = $request->activity;
        $sd_risk->n1 = $request->n1;
        $sd_risk->n2 = $request->n2;
        $sd_risk->n3 = $request->n3;
        $sd_risk->n4 = $request->n4;
        $sd_risk->n5 = $request->n5;
        $sd_risk->n6 = $request->n6;
        $sd_risk->n7 = $request->n7;
        $sd_risk->n8 = $request->n8;
        $sd_risk->n9 = $request->n9;
        $sd_risk->n10 = $request->n10;
        $sd_risk->date = $request->date_fds;
        $sd_risk->ventilation = $request->ventilation;
        $sd_risk->concentration = $request->concentration;
        $sd_risk->time = $request->time;
        $sd_risk->protection = $request->protection;
        $sd_risk->sd_work_unit()->associate($sd_work_unit);
        $sd_risk->save();



        foreach ($request->list_items as $item){

            $sd_equiment = new SdEquipementChemical();
            $sd_equiment->id = uniqid();
            $sd_equiment->name = $item;
            $sd_equiment->sd_risk_chemical()->associate($sd_risk);
            $sd_equiment->save();
        }

        $restraint = "restraint_proposed";

        if (isset($request->$restraint['checked'])){
            foreach ($request->$restraint['checked'] as $restraint){

                $sd_restraint = new SdRestraintChemical();
                $sd_restraint->id = uniqid();
                $sd_restraint->name = $restraint;
                $sd_restraint->exist = true;
                $sd_restraint->sd_risk_chemical()->associate($sd_risk);
                $sd_restraint->save();
            }
        }

        return back()->with('status', 'Risque chimique ajouter !');

    }
}
