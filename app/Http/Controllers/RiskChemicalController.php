<?php

namespace App\Http\Controllers;

use App\Models\DangerLevel;
use App\Models\RestraintChemical;
use App\Models\SdEquipementChemical;
use App\Models\SdRestraintChemical;
use App\Models\SdRiskChemical;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiskChemicalController extends Controller
{
    public function index($id){
        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $page = [
            'title' => 'Evaluation des risques chimiques',
            'infos' => null,
            'sidebar' => 'risk_chemical'
        ];

        $sd_risks_chemicals = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->get();

        return view('app.risk_chemical.index', compact('page', 'single_document', 'sd_risks_chemicals'));
    }

    public function create($id){

        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $page = [
            'title' => 'Créer un risque chimique',
            'url_back' => route('risk.chemical.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques chimiques',
            'sidebar' => 'risk_chemical'
        ];

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_chemical = RestraintChemical::all();

        $danger = DangerLevel::all();

        $danger_level = $danger->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        if (Auth::user()->hasAccess('oza')){
            return view('app.risk_chemical.admin.create', compact('page', 'single_document','works_units','restraints_chemical', 'danger_level'));
        }else{
            return view('app.risk_chemical.client.create', compact('page', 'single_document','works_units'));
        }

    }


    public function edit($id, $risk_chemical){

        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $page = [
            'title' => 'Modifier le risque chimique',
            'url_back' => route('risk.chemical.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques chimiques',
            'sidebar' => 'risk_chemical'
        ];

        $sd_risk = SdRiskChemical::find($risk_chemical);

        if (!$sd_risk) abort(404);

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_chemical = RestraintChemical::all();

        $danger = DangerLevel::all();

        $danger_level = $danger->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        if (Auth::user()->hasAccess('oza')){
            return view('app.risk_chemical.admin.edit', compact('page', 'single_document','works_units','restraints_chemical', 'sd_risk', 'danger_level'));
        }else{
            return view('app.risk_chemical.client.edit', compact('page', 'single_document','works_units', 'sd_risk', 'danger_level', 'restraints_chemical'));
        }

    }

    public function store(Request $request,$id)
    {
        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        if (Auth::user()->hasAccess('oza')){

            // OZA SECTION

            $request->validate([
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
                'protection' => 'required'
            ]);

            if (!empty($request->work_unit)){
                $sd_work_unit = SdWorkUnit::find($request->work_unit);

                if (!$sd_work_unit) abort(404);
            }

            if ($request->n1 === "NC" &&
                $request->n2 === "NC" &&
                $request->n3 === "NC" &&
                $request->n4 === "NC" &&
                $request->n5 === "NC" &&
                $request->n6 === "NC" &&
                $request->n7 === "NC" &&
                $request->n8 === "NC" &&
                $request->n9 === "NC" &&
                $request->n10 === "NC"){
                return back()->with('status','Vous devez renseigner au moins un danger')->with('status_type','danger');
            }

            $sd_risk = new SdRiskChemical();
            $sd_risk->id = uniqid();
            $sd_risk->name = !empty($request->name_risk_chemical) ? $request->name_risk_chemical : null;
            $sd_risk->activity = !empty($request->activity) ? $request->activity : null;
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
            $sd_risk->ventilation = !empty($request->ventilation) ? $request->ventilation : 0;
            $sd_risk->concentration = !empty($request->concentration) ? $request->concentration : 0;
            $sd_risk->time = !empty($request->time) ? $request->time : 0;
            $sd_risk->protection = $request->protection;
            if (isset($sd_work_unit)) $sd_risk->sd_work_unit()->associate($sd_work_unit);
            $sd_risk->single_document()->associate($single_document);
            $sd_risk->save();

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

        }else{

            //CLIENT SECTION

            $request->validate([
                'work_unit' => 'required',
                'name_risk_chemical' => 'required',
                'activity' => 'required',
                'ventilation' => 'required',
                'concentration' => 'required',
                'time' => 'required'
            ]);

            $sd_work_unit = SdWorkUnit::find($request->work_unit);

            if (!$sd_work_unit) abort(404);

            $sd_risk = new SdRiskChemical();
            $sd_risk->id = uniqid();
            $sd_risk->name = $request->name_risk_chemical;
            $sd_risk->activity = $request->activity;
            $sd_risk->ventilation = $request->ventilation;
            $sd_risk->concentration = $request->concentration;
            $sd_risk->time = $request->time;
            $sd_risk->sd_work_unit()->associate($sd_work_unit);
            $sd_risk->single_document()->associate($single_document);
            $sd_risk->save();
        }

        // FOR ALL
        if (!empty($request->list_items)){
            foreach ($request->list_items as $item){

                $sd_equiment = new SdEquipementChemical();
                $sd_equiment->id = uniqid();
                $sd_equiment->name = $item;
                $sd_equiment->sd_risk_chemical()->associate($sd_risk);
                $sd_equiment->save();

            }
        }

        $this->checkValidRisk($sd_risk);

        return redirect()->route('risk.chemical.index', [$single_document->id])->with('status', 'Risque chimique ajouté !');

    }

    public function update(Request $request,$id, $risk_chemical)
    {
        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $sd_risk = SdRiskChemical::find($risk_chemical);

        if (!$sd_risk) abort(404);

        if (Auth::user()->hasAccess('oza')){

            $request->validate([
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
                'protection' => 'required'
            ]);

            if (!empty($request->work_unit)){
                $sd_work_unit = SdWorkUnit::find($request->work_unit);

                if (!$sd_work_unit) abort(404);
            }

            $sd_risk->name = !empty($request->name_risk_chemical) ? $request->name_risk_chemical : null;
            $sd_risk->activity = !empty($request->activity) ? $request->activity : null;
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
            $sd_risk->ventilation = !empty($request->ventilation) ? $request->ventilation : 0;
            $sd_risk->concentration = !empty($request->concentration) ? $request->concentration : 0;
            $sd_risk->time = !empty($request->time) ? $request->time : 0;
            $sd_risk->protection = $request->protection;
            if (isset($sd_work_unit)) $sd_risk->sd_work_unit()->associate($sd_work_unit);
            $sd_risk->single_document()->associate($single_document);
            $sd_risk->save();

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
                                $restraint = new SdRestraintChemical();
                                $restraint->id = uniqid();
                                $restraint->name = $res[$i];
                                $restraint->exist = true;
                                $restraint->sd_risk_chemical()->associate($sd_risk);
                                $restraint->save();
                            }
                        }else{
                            $restraint = SdRestraintChemical::find($key);
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
                    SdRestraintChemical::find($tabDelete[$i])->delete();
                }
            }


        }else{

            $request->validate([
                'work_unit' => 'required',
                'name_risk_chemical' => 'required',
                'activity' => 'required',
                'ventilation' => 'required',
                'concentration' => 'required',
                'time' => 'required',
            ]);

            $sd_work_unit = SdWorkUnit::find($request->work_unit);

            if (!$sd_work_unit) abort(404);

            $sd_risk->name = $request->name_risk_chemical;
            $sd_risk->activity = $request->activity;
            $sd_risk->ventilation = $request->ventilation;
            $sd_risk->concentration = $request->concentration;
            $sd_risk->time = $request->time;
            $sd_risk->sd_work_unit()->associate($sd_work_unit);
            $sd_risk->save();
        }


        $sd_risk->sd_equipements()->delete();

        if (!empty($request->list_items)) {
            foreach ($request->list_items as $item) {

                $sd_equiment = new SdEquipementChemical();
                $sd_equiment->id = uniqid();
                $sd_equiment->name = $item;
                $sd_equiment->sd_risk_chemical()->associate($sd_risk);
                $sd_equiment->save();
            }
        }

        $this->checkValidRisk($sd_risk);

        return redirect()->route('risk.chemical.index', [$single_document->id])->with('status', 'Risque chimique modifié !');

    }


    public function delete(Request $request, $id)
    {

        $request->validate([
            'id_risk' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $sd_risk = SdRiskChemical::find($request->id_risk);

        if (!$sd_risk) abort(404);

        $sd_risk->delete();

        return back()->with('status', 'Le risque a bien été supprimé !');
    }

    public function action($id){

        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $page = [
            'title' => 'Plan d’action de réduction des risques chimiques',
            'sidebar' => 'action_plan',
            'sub_sidebar' => "risk_chemical"
        ];

        $sd_risks = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->get();


        return view('app.risk_chemical.action.restraint', compact('page', 'single_document', 'sd_risks'));
    }

    public function action_store(Request $request,$id){

        $single_document = $this->checkSingleDocument($id);

        $this->checkRiskChemical($single_document);

        $request->validate([
            'id' => 'required',
            'date_restraint' => 'required',
            'decision_restraint' => 'required'
        ]);

        $sd_restraint = SdRestraintChemical::find($request->id);

        if (!$sd_restraint) abort(404);

        $sd_restraint->date = $request->date_restraint;
        $sd_restraint->comment = $request->decision_restraint;
        $sd_restraint->save();

        return back()->with('status', 'La mesure a bien été mise à jour !');
    }


    private function checkValidRisk(SdRiskChemical $sd_risk): void
    {
         $fillable = [
            'name',
            'activity',
            'n1',
            'n2',
            'n3',
            'n4',
            'n5',
            'n6',
            'n7',
            'n8',
            'n9',
            'n10',
            'date',
            'ventilation',
            'concentration',
            'time',
            'protection'
        ];

        for ($i = 0; $i < count($fillable); $i++){
            $temp = $fillable[$i];
            if ($sd_risk->$temp === null) return;

        }
        if (empty($sd_risk->sd_work_unit->name)) return;

        $sd_risk->validated = true;
        $sd_risk->save();

    }
}
