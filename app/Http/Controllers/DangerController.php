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

        return view('app.danger.index', compact('page', 'single_document','danger','risks_all'));
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

        if ($id_sd_work_unit === 'all'){

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

        }else if ($id_sd_work_unit === 'ut_all'){

            $sd_danger->ut_all = $request->checked === 'true' ? 1 : 0;
            $sd_danger->save();

        } else{
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
            }else{
                $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => $request->checked === 'true' ? 1 : 0]);
            }
        }

        return redirect()->route('danger.index', [$single_document->id, $sd_danger->id]);
    }

    public function comment(Request $request, $id, $id_sd_danger){

        $request->validate([
            'comment' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$danger) abort(404);

        $danger->comment = $request->comment;
        $danger->save();

        return redirect()->route('danger.index', [$single_document->id, $danger->id]);
    }

    public function store(Request $request, $id, $id_sd_danger){

        $request->validate([
            'checked' => 'required'
        ]);

        $single_document = $this->checkSingleDocument($id);

        $danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        $danger->validated = $request->checked === 'true' ? 1 : 0;
        $danger->save();

        return redirect()->route('danger.index', [$single_document->id, $danger->id]);
    }

}
