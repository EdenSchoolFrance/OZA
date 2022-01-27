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

        $sd_works_units = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        return view('app.restraint.index', compact('page', 'single_document','sd_works_units'));
    }

    public function archived($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Mesures archivée',
            'infos' => null,
            'sidebar' => 'action_plan',
            'sub_sidebar' => 'restraint_archived'
        ];

        $sd_works_units = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        return view('app.restraint.archived', compact('page', 'single_document','sd_works_units'));
    }

    public function store(Request $request,$id){

        $request->validate([
            'id_restraint' => 'required',
            'date_restraint' => 'required',
            'tech_modal' => 'required',
            'orga_modal' => 'required',
            'human_modal' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $restraint = SdRestraint::where('id',$request->id_restraint)->first();

        if($restraint->sd_risk->sd_danger->single_document->id !== $single_document->id) return back()->with('status','Une erreur est survenue')->with('status-type','danger');

        $restraint->date = $request->date_restraint;
        $restraint->technical = $request->tech_modal;
        $restraint->organizational = $request->orga_modal;
        $restraint->human = $request->human_modal;
        $restraint->exist = 1;
        $restraint->save();

        return back()->with('status','La mesure a bien été enregistrée');
    }
}
