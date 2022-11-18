<?php

namespace App\Http\Controllers\Admin;

use App\Models\PsychosocialQuestionRestraint;
use App\Models\SdPsychosocialResponseRestraint;
use App\Models\SingleDocument;
use Illuminate\Http\Request;
use App\Models\SdPsychosocialGroup;
use App\Http\Controllers\Controller;
use App\Models\PsychosocialQuestion;
use Illuminate\Support\Facades\Auth;
use App\Models\SdPsychosocialResponse;
use Database\Seeders\PsychosocialQuestionSeeder;

class PsychosocialController extends Controller
{

    public function index()
    {
        $page = [
            'title' => 'Risques psychosociaux (complétion)',
            'infos' => null,
            'sidebar' => 'help',
            'sub_sidebar' => 'risk_psycho'
        ];

        $questions = PsychosocialQuestion::all();

        return view('admin.psychosocial.index', compact('page', 'questions'));
    }


    public function evaluation($id, $id_psychosocial_group)
    {
        $single_document = $this->checkSingleDocument($id);

        $psychosocial_group = SdPsychosocialGroup::where('id', $id_psychosocial_group)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$psychosocial_group) abort(404);

        $page = [
            'title' => 'Évaluation des risques psychosociaux',
            'psychosocial' => $psychosocial_group->name,
            'sidebar' => 'risk_psycho',
            'sub_sidebar' => $psychosocial_group->id . '.evaluation'
        ];

        $questions = PsychosocialQuestion::all();

        if (Auth::user()->hasAccess('oza')) {
            return view('admin.psychosocial.evaluation.edit', compact('page', 'single_document', 'psychosocial_group', 'questions'));
        } else {
            return view('admin.psychosocial.evaluation.index', compact('page', 'single_document', 'psychosocial_group', 'questions'));
        }
    }

    public function evaluation_store(Request $request, $id, $id_psychosocial_group)
    {
        $single_document = $this->checkSingleDocument($id);

        $psychosocial_group = SdPsychosocialGroup::where('id', $id_psychosocial_group)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$psychosocial_group) abort(404);

        $request->validate([
            'checked' => 'required',
            'number_quiz' => 'required|integer|min:1',
            'stress_level' => 'required|integer|min:0|max:100',
            'questions' => 'required|array',
            'questions.*.never' => 'required|integer|min:0',
            'questions.*.sometimes' => 'required|integer|min:0',
            'questions.*.often' => 'required|integer|min:0',
            'questions.*.always' => 'required|integer|min:0',
        ]);

        $questions = PsychosocialQuestion::all();

        foreach ($questions as $question) {
            if (!array_key_exists($question->id, $request->questions)) {
                return back()->withInput()->with('status', 'Une erreur est survenue !')->with('status_type', 'danger');
            }
        }

        $psychosocial_group->number_quiz = $request->number_quiz;
        $psychosocial_group->stress_level = $request->stress_level;

        foreach ($questions as $question) {
            $response = $question->response($psychosocial_group->id);

            if (!$response) {
                $response = new SdPsychosocialResponse();
                $response->id = uniqid();
                $response->group()->associate($psychosocial_group);
                $response->question()->associate($question);
            }
            $response->never = $request->questions[$question->id]['never'];
            $response->sometimes = $request->questions[$question->id]['sometimes'];
            $response->often = $request->questions[$question->id]['often'];
            $response->always = $request->questions[$question->id]['always'];
            $response->save();
        }

        if ($request->checked == "true") {
            $psychosocial_group->validated = true;
        } else {
            $psychosocial_group->validated = false;
        }

        $psychosocial_group->save();

        return back()->with('status', 'Le questionnaire a bien été enregistré !');
    }


    public function restraint($id, $id_psychosocial_group){

        $single_document = $this->checkSingleDocument($id);

        $psychosocial_group = SdPsychosocialGroup::where('id', $id_psychosocial_group)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$psychosocial_group) abort(404);

        $page = [
            'title' => 'Définition des mesures à prendre',
            'psychosocial' => $psychosocial_group->name,
            'sidebar' => 'risk_psycho',
            'sub_sidebar' => $psychosocial_group->id . '.restraint'
        ];

        $responses = SdPsychosocialResponse::whereHas('group' , function ($q) use ($psychosocial_group){
            $q->where('id', $psychosocial_group->id);
        })->get()->filter(function ($rep, $key){
            if ($rep->priority()['text'] === "Modéré" || $rep->priority()['text'] === "Elevé")
                return $rep;
        });

        return view('admin.psychosocial.restraint.index', compact('page', 'single_document', 'psychosocial_group', 'responses'));
    }

    public function restraint_store(Request $request, $id, $id_psychosocial_group){

        $single_document = $this->checkSingleDocument($id);

        $psychosocial_group = SdPsychosocialGroup::where('id', $id_psychosocial_group)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();

        if (!$psychosocial_group) abort(404);

        $responses = SdPsychosocialResponse::whereHas('group' , function ($q) use ($psychosocial_group){
            $q->where('id', $psychosocial_group->id);
        })->get()->filter(function ($rep, $key){
            if ($rep->priority()['text'] === "Modéré" || $rep->priority()['text'] === "Elevé")
                return $rep;
        });

        foreach ($responses as $response){

            $response->restraints()->delete();

            $temp = "restraint_proposed_".$response->id;

            if ($request->$temp){

                foreach ($request->$temp as $res){

                    $restraint = new SdPsychosocialResponseRestraint();
                    $restraint->id = uniqid();
                    $restraint->text = $res;
                    $restraint->response()->associate($response);
                    $restraint->save();

                }

            }

        }
        return back()->with('status', 'Les questions on bien étais mise à jour !');
    }


    public function help_store(Request $request){

        $questions = PsychosocialQuestion::all();

        foreach ($questions as $question){

            $question->restraints()->delete();

            $temp = "restraint_proposed_".$question->id;

            if ($request->$temp){

                foreach ($request->$temp as $res){

                    $restraint = new PsychosocialQuestionRestraint();
                    $restraint->id = uniqid();
                    $restraint->text = $res;
                    $restraint->question()->associate($question);
                    $restraint->save();

                }

            }

        }
        return back()->with('status', 'Les questions on bien étais mise à jour !');
    }
}
