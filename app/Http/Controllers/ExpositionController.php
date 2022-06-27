<?php

namespace App\Http\Controllers;

use App\Models\SdDanger;
use App\Models\Exposition;
use App\Models\SdExpositionQuestion;
use App\Models\SdWorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpositionController extends Controller
{
    public function store(Request $request, $id, $id_sd_danger, $id_sd_work_unit, $id_exposition)
    {
        $single_document = $this->checkSingleDocument($id);

        $sd_danger = SdDanger::where('id',$id_sd_danger)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$sd_danger) abort(404);

        $sd_work_unit = SdWorkUnit::where('id',$id_sd_work_unit)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$sd_work_unit) abort(404);

        $exposition = Exposition::where('id', $id_exposition)->whereHas('danger', function ($q) use ($sd_danger) {
            $q->where('id', $sd_danger->danger->id);
        })->first();
        if (!$exposition) abort(404);

        $sd_exposition_questions = [];

        foreach ($exposition->exposition_groups as $exposition_group) {
            foreach ($exposition_group->exposition_questions as $exposition_question) {
                $rules = [
                    'exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id => 'required_with:exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id . '|required_with:exposition_value.' . $exposition_group->id . '_' . $exposition_question->id . '|string|nullable',
                    'exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id => 'required_with:exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id . '|required_with:exposition_value.' . $exposition_group->id . '_' . $exposition_question->id . '|integer|nullable|min:1',
                    'exposition_value.' . $exposition_group->id . '_' . $exposition_question->id => 'required_with:exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id . '|required_with:exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id . '|integer|nullable|min:1',
                ];
                $translate = [
                    'exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id => "\"" . $exposition_group->intervention_type_label . "\"",
                    'exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id => "\"Nombre de personnes concernées\"",
                    'exposition_minutes.' . $exposition_group->id . '_' . $exposition_question->id => '"Durée en mm / j"',
                    'exposition_value.' . $exposition_group->id . '_' . $exposition_question->id => "\"" . $exposition_group->value_label . "\"",
                ];

                if ($exposition_group->type == "duration") {
                    $rules['exposition_minutes.' . $exposition_group->id . '_' . $exposition_question->id] = 'nullable|integer|min:1';

                    $translate['exposition_value.' . $exposition_group->id . '_' . $exposition_question->id] = '"Durée en h / an"';
                }

                $validator = Validator::make($request->all(), $rules, [
                    "required_with" => ":attribute est obligatoire !"
                ], $translate);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput()->with('scrollTo', '.card--exposition-' . $sd_work_unit->id);
                }

                $sd_exposition_question = $exposition_question->sd_work_unit_exposition_question($sd_work_unit->id);

                if ($sd_exposition_question && $request->input('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) == null) {
                    array_push($sd_exposition_questions, ["action" => "delete", "sd_exposition_question" => $sd_exposition_question]);
                } elseif ($request->input('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id) != null) {
                    if (!$sd_exposition_question) {
                        $sd_exposition_question = new SdExpositionQuestion();
                        $sd_exposition_question->id = uniqid();
                    }
                    if ($exposition_question->options) {
                        $sd_exposition_question->intervention_type = unserialize($exposition_question->options)[$request->input('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id)];
                    } else {
                        $sd_exposition_question->intervention_type = $request->input('exposition_intervention_type.' . $exposition_group->id . '_' . $exposition_question->id);
                    }
                    $sd_exposition_question->number_employee = $request->input('exposition_number_employee.' . $exposition_group->id . '_' . $exposition_question->id);
                    if ($exposition_group->type == "duration") {
                        $sd_exposition_question->minutes = $request->input('exposition_minutes.' . $exposition_group->id . '_' . $exposition_question->id);
                    }
                    $sd_exposition_question->value = $request->input('exposition_value.' . $exposition_group->id . '_' . $exposition_question->id);
                    $sd_exposition_question->sd_work_unit()->associate($sd_work_unit);
                    $sd_exposition_question->exposition_question()->associate($exposition_question);

                    array_push($sd_exposition_questions, ["action" => "upsert", "sd_exposition_question" => $sd_exposition_question]);
                }
            }
        }

        if (count($sd_exposition_questions) == 0) {
            return back()->withErrors(["exposition" => 'Veuillez remplir l\'évaluation de l\'exposition aux facteurs de risques professionnels !'])->with('scrollTo', '.card--exposition-' . $sd_work_unit->id);
        }

        foreach ($sd_exposition_questions as $data) {
            switch ($data['action']) {
                case 'upsert':
                    $data["sd_exposition_question"]->save();
                    break;
                case 'delete':
                    $data["sd_exposition_question"]->delete();
                    break;
            }
        }

        return back()->with('status', 'L\'évaluation de l\'exposition aux facteurs de risques professionnels a bien été enregistré !');
    }
}
