<?php

namespace App\Http\Controllers;

use App\Models\SdRestraint;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;

class RestraintController extends Controller
{
    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Mesures à prendre',
            'infos' => null,
            'sidebar' => 'action_plan',
            'sub_sidebar' => 'restraint_porposed'
        ];

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 0);
        })->get()->sortByDesc(function ($sd_risk, $key) {
            return $sd_risk->totalRR($sd_risk->sd_restraints);
        });

        return view('app.restraint.index', compact('page', 'single_document', 'sd_risks'));
    }

    public function archived($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Mesures archivées',
            'infos' => null,
            'sidebar' => 'action_plan',
            'sub_sidebar' => 'restraint_archived'
        ];

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 1)->whereNotNull('date');
        })->get();

        return view('app.restraint.archived', compact('page', 'single_document', 'sd_risks'));
    }


    public function store(Request $request,$id){

        $request->validate([
            'id_restraint' => 'required',
            'name_restraint' => 'required',
            'date_restraint' => 'required|date',
            'tech' => 'required',
            'orga' => 'required',
            'human' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $restraint = SdRestraint::where('id',$request->id_restraint)->first();

        if($restraint->sd_risk->sd_danger->single_document->id !== $single_document->id) return back()->with('status','Une erreur est survenue')->with('status_type','danger');

        $restraint->name = $request->name_restraint;
        $restraint->date = $request->date_restraint;
        $restraint->technical = $request->tech;
        $restraint->organizational = $request->orga;
        $restraint->human = $request->human;
        $restraint->exist = 1;
        $restraint->save();

        return back()->with('status','La mesure a bien été enregistrée');
    }
}
