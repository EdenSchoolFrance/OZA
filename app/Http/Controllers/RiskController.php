<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function accident($id){

        $page = [
            'title' => 'Evaluation des risques professionnels',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        return view('app.risk.accident', compact('page','id'));

    }

    public function accidentCreate($id){

        $page = [
            'title' => 'Créer un risque',
            'link_back' => route('risk.accident',['id'=> $id]),
            'text_back'=> 'Retour à l’évaluation des risques',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        return view('app.risk.create', compact('page','id'));

    }
}
