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

    public function all($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Tous les risques',
            'infos' => null,
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'risk_all'
        ];

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 1);
        })->get();

        return view('app.risk.all', compact('page', 'single_document', 'sd_risks'));
    }

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


    public function post($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Liste des postes à risque particulier',
            'infos' => 'Tous les salariés embauchés pour travailler à l’un de ces postes, en contrat de travail précaire (autre que CDI), doivent bénéficier d’une formation renforcée à la sécurité,
                        ainsi que d’un accueil et d’une formation adaptés dans l’entreprise. Obtenir l’avis du médecin du travail, du CSE ou, à défaut, des représentants du personnel, s’il en existe.
                        Liste tenue à la disposition des agents de contrôle de l’inspection du travail (amende de 10 000 €uros en cas de non présentation : art. L.4741-1).',
            'sidebar' => 'risk_post'
        ];

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->get()->filter(function ($sd_risk, $key) {
            return $sd_risk->total() > 23;
        })->all();

        return view('app.risk.post', compact('page', 'single_document','sd_risks'));
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
            'impact' => 'required'
        ]);

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $request->name_risk;
        $sd_risk->frequency = $request->frequency;
        $sd_risk->probability = $request->probability;
        $sd_risk->gravity = $request->gravity;
        $sd_risk->impact = $request->impact;
        $sd_risk->sd_danger()->associate($sd_danger);
        if ($sd_work_unit) $sd_risk->sd_work_unit()->associate($sd_work_unit);
        $sd_risk->save();

        if (isset($request->restraint)){
            foreach ($request->restraint as $restraint){
                $restraint = explode('|', $restraint);
                if( empty($restraint[0]) || empty($restraint[1]) || empty($restraint[2]) || empty($restraint[3]) ) return back()->with('status','Des mesures sont incomplete')->with('status-type','danger');
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
        }

        if (isset($request->restraint_proposed)){
            foreach ($request->restraint_proposed as $restraint){

                $sd_restraint = new SdRestraint();
                $sd_restraint->id = uniqid();
                $sd_restraint->name = $restraint;
                $sd_restraint->exist = false;
                $sd_restraint->sd_risk()->associate($sd_risk);
                $sd_restraint->save();
            }
        }


        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id])->with('status', 'Le risque a bien été créé !');
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
            'impact' => 'required'
        ]);

        $old_sd_risk = SdRisk::find($id_risk);
        $old_sd_risk->delete();

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $request->name_risk;
        $sd_risk->frequency = $request->frequency;
        $sd_risk->probability = $request->probability;
        $sd_risk->gravity = $request->gravity;
        $sd_risk->impact = $request->impact;
        $sd_risk->sd_danger()->associate($sd_danger);
        if ($sd_work_unit) $sd_risk->sd_work_unit()->associate($sd_work_unit);
        $sd_risk->save();

        if (isset($request->restraint)){
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
        }

        if (isset($request->restraint_proposed)){
            foreach ($request->restraint_proposed as $restraint){

                $sd_restraint = new SdRestraint();
                $sd_restraint->id = uniqid();
                $sd_restraint->name = $restraint;
                $sd_restraint->exist = false;
                $sd_restraint->sd_risk()->associate($sd_risk);
                $sd_restraint->save();
            }
        }


        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id])->with('status', 'Le risque a bien été modifié !');
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


    public function duplicate(Request $request, $id, $id_danger){

        $request->validate([
            'id_risk' => 'required',
            'work_unit' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$danger) abort(404);

        if ($request->work_unit !== 'all'){
            $work_unit = SdWorkUnit::where('id',$request->work_unit)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->first();
            if (!$work_unit) abort(404);
        }

        $risk = SdRisk::where('id',$request->id_risk)->whereHas('sd_danger', function ($q) use ($danger){
            $q->where('id', $danger->id);
        })->first();
        if (!$risk) abort(404);

        $new_risk = $risk->replicate();
        $new_risk->id = uniqid();
        $new_risk->sd_work_unit()->associate($request->work_unit !== 'all' ? $work_unit : null);
        $new_risk->save();

        foreach ($risk->sd_restraints as $restraint){
            $new_restraint = $restraint->replicate();
            $new_restraint->id = uniqid();
            $new_restraint->sd_risk()->associate($new_risk);
            $new_restraint->save();
        }

        return redirect()->route('risk.edit', [$single_document->id, $danger->id, $new_risk->id])->with('status', 'Le risque a bien été dupliqué !');
    }

    public function delete(Request $request, $id, $id_sd_danger){

        $request->validate([
            'id_risk' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$danger) abort(404);

        $risk = SdRisk::where('id',$request->id_risk)->whereHas('sd_danger', function ($q) use ($danger){
            $q->where('id', $danger->id);
        })->first();
        if (!$risk) abort(404);

        $risk->delete();

        return back()->with('status', 'Le risque a bien été supprimé !');
    }

}
