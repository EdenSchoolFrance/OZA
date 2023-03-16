<?php

namespace App\Http\Controllers;

use App\Models\DangerLevel;
use App\Models\RestraintExplosion;
use App\Models\SdPreventionExplosion;
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

        $restraints_explosion = RestraintExplosion::all();

        return view('app.risk_explosion.create', compact('page', 'single_document','restraints_explosion'));

    }

    public function edit($id, $risk_explosion){

        $single_document = $this->checkSingleDocument($id);

        $sd_risk = SdRiskExplosion::find($risk_explosion);

        if (!$sd_risk) abort(404);

        $page = [
            'title' => 'Modifier le risque explosion',
            'url_back' => route('risk.explosion.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques d\'explosion',
            'sidebar' => 'risk_explosion'
        ];

        return view('app.risk_explosion.edit', compact('page', 'single_document','sd_risk'));

    }

    public function store(Request $request, $id){

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'material_explosion' => 'required',
            'features' => 'required',
            'material_setup' => 'required',
            'source_clean' => 'required',
            'degree_clean' => 'required',
            'degree_ventilation' => 'required',
            'availability_ventilation' => 'required',
            'size_area' => 'required',
            'gas' => 'required',
            'dust' => 'required',
            'spawn_probability' => 'required',
            'prevention_probability' => 'required',
            'criticity' => 'required'
        ]);

        $sd_risk = new SdRiskExplosion();
        $sd_risk->id = uniqid();
        $sd_risk->material_explosion = $request->material_explosion;
        $sd_risk->features = $request->features;
        $sd_risk->material_setup = $request->material_setup;
        $sd_risk->source_clean = $request->source_clean;
        $sd_risk->degree_clean = $request->degree_clean;
        $sd_risk->degree_ventilation = $request->degree_ventilation;
        $sd_risk->availability_ventilation = $request->availability_ventilation;
        $sd_risk->size_area = $request->size_area;
        $sd_risk->gas = $request->gas;
        $sd_risk->dust = $request->dust;
        $sd_risk->spawn_probability = $request->spawn_probability;
        $sd_risk->prevention_probability = $request->prevention_probability;
        $sd_risk->criticity = $request->criticity;
        $sd_risk->single_document()->associate($single_document);
        $sd_risk->save();


        if (!empty($request->list_items)){
            foreach ($request->list_items as $item){

                $sd_equiment = new SdPreventionExplosion();
                $sd_equiment->id = uniqid();
                $sd_equiment->name = $item;
                $sd_equiment->sd_risk_explosion()->associate($sd_risk);
                $sd_equiment->save();

            }
        }

        $restraint = "restraint_proposed";

        if (isset($request->$restraint['checked'])){
            foreach ($request->$restraint['checked'] as $restraint){

                $sd_restraint = new SdRestraintExplosion();
                $sd_restraint->id = uniqid();
                $sd_restraint->name = $restraint;
                $sd_restraint->exist = true;
                $sd_restraint->sd_risk_explosion()->associate($sd_risk);
                $sd_restraint->save();
            }
        }

        return redirect()->route('risk.explosion.index', [$single_document->id])->with('status', 'Risque explosion ajouté !');
    }

    public function update(Request $request, $id, $risk_explosion){

        $single_document = $this->checkSingleDocument($id);

        $sd_risk = SdRiskExplosion::find($risk_explosion);

        if (!$sd_risk) abort(404);

        $request->validate([
            'material_explosion' => 'required',
            'features' => 'required',
            'material_setup' => 'required',
            'source_clean' => 'required',
            'degree_clean' => 'required',
            'degree_ventilation' => 'required',
            'availability_ventilation' => 'required',
            'size_area' => 'required',
            'gas' => 'required',
            'dust' => 'required',
            'spawn_probability' => 'required',
            'prevention_probability' => 'required',
            'criticity' => 'required'
        ]);


        $sd_risk->material_explosion = $request->material_explosion;
        $sd_risk->features = $request->features;
        $sd_risk->material_setup = $request->material_setup;
        $sd_risk->source_clean = $request->source_clean;
        $sd_risk->degree_clean = $request->degree_clean;
        $sd_risk->degree_ventilation = $request->degree_ventilation;
        $sd_risk->availability_ventilation = $request->availability_ventilation;
        $sd_risk->size_area = $request->size_area;
        $sd_risk->gas = $request->gas;
        $sd_risk->dust = $request->dust;
        $sd_risk->spawn_probability = $request->spawn_probability;
        $sd_risk->prevention_probability = $request->prevention_probability;
        $sd_risk->criticity = $request->criticity;
        $sd_risk->single_document()->associate($single_document);
        $sd_risk->save();

        $sd_risk->sd_preventions()->delete();

        if (!empty($request->list_items)) {
            foreach ($request->list_items as $item) {

                $sd_equiment = new SdPreventionExplosion();
                $sd_equiment->id = uniqid();
                $sd_equiment->name = $item;
                $sd_equiment->sd_risk_explosion()->associate($sd_risk);
                $sd_equiment->save();
            }
        }

        $tabDelete = [];
        foreach ($sd_risk->sd_restraints as $res) {
            $tabDelete[] = $res->id;
        }

        $P = "restraint_proposed_".$sd_risk->id;

        if (isset($request->$P['checked'])) {
            foreach ((array)$request->$P['checked'] as $key => $res) {
                if ($res[0] !== null){
                    if ($key === "new"){
                        for ($i = 0; $i < count($res); $i++) {
                            $restraint = new SdRestraintExplosion();
                            $restraint->id = uniqid();
                            $restraint->name = $res[$i];
                            $restraint->exist = true;
                            $restraint->sd_risk_explosion()->associate($sd_risk);
                            $restraint->save();
                        }
                    }else{
                        $restraint = SdRestraintExplosion::find($key);
                        $restraint->name = $res[0];
                        $restraint->exist = true;
                        $restraint->save();

                        $index = array_search($key, $tabDelete);
                        array_splice($tabDelete, $index, $index+1);
                    }
                }
            }
        }
        if (count($tabDelete) > 0){
            for ($i = 0; $i < count($tabDelete); $i++){
                SdRestraintExplosion::find($tabDelete[$i])->delete();
            }
        }

        return redirect()->route('risk.explosion.index', [$single_document->id])->with('status', 'Risque explosion modifier !');

    }

    public function delete(Request $request, $id)
    {

        $request->validate([
            'id_risk' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $sd_risk = SdRiskExplosion::find($request->id_risk);

        if (!$sd_risk) abort(404);

        $sd_risk->delete();

        return back()->with('status', 'Le risque a bien été supprimé !');
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

        return view('app.risk_explosion.action.restraint', compact('page', 'single_document', 'sd_risks'));
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
