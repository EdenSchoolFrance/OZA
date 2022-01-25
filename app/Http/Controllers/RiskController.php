<?php

namespace App\Http\Controllers;

use App\Models\DomainActivitie;
use App\Models\Risk;
use App\Models\SdDanger;
use App\Models\SdRestraint;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;

class RiskController extends Controller
{

    public function create($id, $id_danger, $id_sd_work_unit, $id_risk = null)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque',
            'url_back' => route('danger.index', [$id,$id_danger]),
            'text_back' => 'Retour à l’évaluation des risques',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = SdDanger::where('id',$id_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $domaine_activities = DomainActivitie::all();

        if ($id_sd_work_unit !== 'all'){

            $sd_work_unit = SdWorkUnit::where('id',$id_sd_work_unit)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->first();

            if (!$sd_work_unit) abort(404);
        }

        if ($id_risk !== null){
            $risk = Risk::find($id_risk);
            return view('app.risk.create', compact('page', 'single_document','danger','domaine_activities','id_sd_work_unit','risk'));
        }

        return view('app.risk.create', compact('page', 'single_document','danger','domaine_activities','id_sd_work_unit'));
    }

    public function edit($id, $id_danger, $id_risk)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Editer un risque',
            'url_back' => route('danger.index', [$id,$id_danger]),
            'text_back' => 'Retour à l’évaluation des risques',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = SdDanger::where('id',$id_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $domaine_activities = DomainActivitie::all();

        $risk = SdRisk::where('id', $id_risk)->whereHas('sd_danger', function ($q) use ($danger) {
            $q->where('id', $danger->id);
        })->first();

        if (!$risk) abort(404);

        return view('app.risk.edit', compact('page', 'single_document','danger','domaine_activities', 'risk'));
    }

    public function store(Request $request, $id, $id_sd_danger, $id_sd_work_unit){
        $single_document = $this->checkSingleDocument($id);
        $sd_danger = SdDanger::find($id_sd_danger);
        if (!$sd_danger) abort(404);
        $sd_work_unit = SdWorkUnit::find($id_sd_work_unit);

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
        if ($sd_work_unit) $sd_risk->sd_work_unit()->associate($sd_work_unit);
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

        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id]);
    }


    public function update(Request $request, $id, $id_sd_danger, $id_sd_work_unit ,$id_risk){
        $single_document = $this->checkSingleDocument($id);
        $sd_danger = SdDanger::find($id_sd_danger);

        if (!$sd_danger) abort(404);

        $sd_work_unit = SdWorkUnit::find($id_sd_work_unit);

        $request->validate([
            'name_risk' => 'required',
            'frequency' => 'required',
            'probability' => 'required',
            'gravity' => 'required',
            'gender' => 'required',
            'restraint' => 'required|array',
            'restraint_proposed' => 'required|array',
        ]);

        $old_sd_risk = SdRisk::find($id_risk);
        $old_sd_risk->delete();

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $request->name_risk;
        $sd_risk->frequency = $request->frequency;
        $sd_risk->probability = $request->probability;
        $sd_risk->gravity = $request->gravity;
        $sd_risk->impact = $request->gender;
        $sd_risk->sd_danger()->associate($sd_danger);
        if ($sd_work_unit) $sd_risk->sd_work_unit()->associate($sd_work_unit);
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

        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id]);
    }

    public function filter(Request $request, $id, $id_sd_danger){

        $single_document = $this->checkSingleDocument($id);
        $sd_danger = SdDanger::find($id_sd_danger);
        if (!$sd_danger) abort(404);

        if ($request->ajax()){

            if (empty($request->filterUt)){
                if ($request->filterSa === 'none'){
                    $data = Risk::all();
                }else{
                    $data = Risk::whereHas('domain_activitie', function ($q) use ($request) {
                        $q->where('id', $request->filterSa);
                    })->get();
                }

            }else if ($request->filterSa === 'none' && $request->filterUt){
                $data = Risk::where('name', 'like', '%' . $request->filterUt . '%')->get();
            }else{

                $data = Risk::whereHas('domain_activitie', function ($q) use ($request) {
                    $q->where('id', $request->filterSa);
                })->where('name', 'like', '%' . $request->filterUt . '%')->get();

            }

            return response()->json($data);

        }

        abort(404);

    }



}
