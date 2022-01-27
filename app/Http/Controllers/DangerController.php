<?php

namespace App\Http\Controllers;

use App\Models\SdDanger;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;

class DangerController extends Controller
{
    public function index($id, $id_danger)
    {
        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $page = [
            'title' => 'Evaluation des risques professionnels',
            'dangers' => $danger->danger->info,
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'danger_'.$danger->id
        ];

        $risks_all = SdRisk::where('sd_work_unit_id', null)->whereHas('sd_danger', function ($q) use ($danger) {
            $q->where('id', $danger->id);
        })->get();

        $sd_works_units = $danger->sd_works_units()->wherePivot('exist',1)->get();

        return view('app.danger.index', compact('page', 'single_document','danger','risks_all','sd_works_units'));
    }

    public function validated(Request $request, $id, $id_sd_danger, $id_sd_work_unit){
        $single_document = $this->checkSingleDocument($id);

        $sd_danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$sd_danger) abort(404);

        $request->validate([
            'checked' => 'required'
        ]);

        if ($id_sd_work_unit === 'global'){
            $sd_works_units = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->get();

            if (!$sd_works_units) abort(404);

            $sd_danger->exist = $request->checked === 'true' ? 1 : 0;
            $sd_danger->ut_all = $request->checked === 'true' ? null : 0;
            $sd_danger->save();

            foreach ($sd_works_units as $sd_work_unit){

                $danger = SdDanger::whereHas('sd_works_units', function ($q) use ($sd_danger,$sd_work_unit) {
                    $q->where('sd_danger_id',$sd_danger->id);
                    $q->where('sd_work_unit_id', $sd_work_unit->id);
                })->first();

                if (isset($danger)){
                    if ($request->checked === 'false'){
                        $danger->sd_works_units()->detach($sd_work_unit);
                        $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => 0]);
                    }else{
                        $danger->sd_works_units()->detach($sd_work_unit);
                    }
                }else{
                    if ($request->checked === 'false'){
                        $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => 0]);
                    }
                }
            }

        } elseif ($id_sd_work_unit === 'all'){
            $sd_danger->ut_all = $request->checked === 'true' ? 1 : 0;
            $sd_danger->save();
        } else {
            $sd_work_unit = SdWorkUnit::where('id',$id_sd_work_unit)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->first();
            if (!$sd_work_unit) abort(404);

            $danger = SdDanger::whereHas('sd_works_units', function ($q) use ($sd_danger,$sd_work_unit) {
                $q->where('sd_danger_id',$sd_danger->id);
                $q->where('sd_work_unit_id', $sd_work_unit->id);
            })->first();

            if (isset($danger)){
                $danger->sd_works_units()->detach($sd_work_unit);
                $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => $request->checked === 'true' ? 1 : 0]);
            } else {
                $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => $request->checked === 'true' ? 1 : 0]);
            }
        }

        return back()->with('status', 'Le risque a bien changé de statut !');
    }

    public function comment(Request $request, $id, $id_sd_danger) {
        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $danger->comment = $request->comment;
        $danger->save();

        return back()->with('status', 'Le commentaire du danger a bien été modifié !');
    }

    public function store(Request $request, $id, $id_sd_danger) {
        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'checked' => 'required'
        ]);

        $danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if ($danger->exist === 1){
            $all = 0;

            if ($danger->ut_all === null) return back()->with('status', 'Vous devez valider tout les unités de travail !')->with('status_type','danger');
            else if ($danger->ut_all === 0) $all++;

            $sd_works_units = SdWorkUnit::where('validated',1)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->whereHas('sd_dangers', function ($q) use ($danger){
                $q->where('id',$danger->id);
            })->get();

            foreach ($sd_works_units as $sd_work_unit){
                if ($sd_work_unit->sd_danger($danger->id) === null) return back()->with('status', 'Vous devez valider tout les unités de travail !')->with('status_type','danger');
                else if ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 0) $all++;
                else if ($sd_work_unit->sd_danger($danger->id)->pivot->exist === 1 && $sd_work_unit->sd_risks === null) return back()->with('status', 'Vous devez valider tout les unités de travail !')->with('status_type','danger');
            }

            if ($all === (count($sd_works_units) + 1) ) return back()->with('status', 'Vous devez valider au moins une unité de travail !')->with('status_type','danger');

        }

        $danger->validated = $request->checked === 'true' ? 1 : 0;
        $danger->save();

        return back()->with('status', 'Le danger a bien été enregisté !');
    }

}
