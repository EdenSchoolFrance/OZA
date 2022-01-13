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

        $page = [
            'title' => 'Evaluation des risques professionnels',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = SdDanger::where('id',$id_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $risks_all = SdRisk::where('sd_work_unit_id', null)->whereHas('sd_danger', function ($q) use ($danger) {
            $q->where('id', $danger->id);
        })->get();

        return view('app.danger.index', compact('page', 'single_document','danger','risks_all'));
    }

    public function validated(Request $request, $id, $id_sd_danger, $id_sd_work_unit){

        $single_document = $this->checkSingleDocument($id);
        $sd_danger = SdDanger::find($id_sd_danger);
        if (!$sd_danger) abort(404);
        $sd_work_unit = SdWorkUnit::find($id_sd_work_unit);

        $request->validate([
            'checked' => 'required'
        ]);

        $danger = SdDanger::whereHas('sd_works_units', function ($q) use ($sd_danger,$sd_work_unit) {
            $q->where('sd_danger_id',$sd_danger->id);
            $q->where('sd_work_unit_id', $sd_work_unit->id);
        })->first();

        if (isset($danger)){
            $danger->sd_works_units()->detach($sd_work_unit);
            $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => $request->checked === 'true' ? 1 : 0]);
        }else{
            $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => $request->checked === 'true' ? 1 : 0]);

        }
        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id]);
    }
}
