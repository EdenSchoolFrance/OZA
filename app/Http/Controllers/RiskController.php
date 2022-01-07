<?php

namespace App\Http\Controllers;

use App\Models\Danger;
use Illuminate\Http\Request;

class RiskController extends Controller
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

        $danger = Danger::find($id_danger);

        return view('app.risk.index', compact('page', 'single_document','danger'));
    }

    public function create($id, $id_danger)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque',
            'link_back' => route('risk.index', [$id,$id_danger]),
            'text_back' => 'Retour à l’évaluation des risques',
            'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        $danger = Danger::find($id_danger);

        return view('app.risk.create', compact('page', 'single_document','danger'));
    }
}
