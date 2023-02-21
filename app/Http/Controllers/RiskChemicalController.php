<?php

namespace App\Http\Controllers;

use App\Models\RestraintChemical;
use App\Models\SdRiskChemical;
use App\Models\SdWorkUnit;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class RiskChemicalController extends Controller
{
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
            'list_items' => 'required',
            'protection' => 'required'
        ]);

        $work_unit = SdWorkUnit::find($request->work_unit)->get();

        if (!$work_unit) abort(404);

        $sd_risk = new SdRiskChemical();
        $sd_risk->name = $request->name_risk;
        $sd_risk->activity = $request->activity;
        $sd_risk->n1 = $request->n1;
        //fois 10
    }
}
