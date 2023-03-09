<?php

namespace App\Http\Controllers;

use App\Models\DangerLevel;
use App\Models\RestraintExplosion;
use App\Models\SdRiskExplosion;
use App\Models\SdWorkUnit;
use Illuminate\Support\Facades\Auth;

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

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_explosion = RestraintExplosion::all();

        $danger_level = DangerLevel::all();

    }
}
