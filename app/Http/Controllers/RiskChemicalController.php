<?php

namespace App\Http\Controllers;

use App\Models\RestraintChemical;
use App\Models\SdWorkUnit;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class RiskChemicalController extends Controller
{
    public function create($id){

        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer un risque chimiques',
            'url_back' => route('risk.chemical.index', [$id]),
            'text_back' => 'Retour à l’évaluation des risques chimiques',
            'sidebar' => 'risk_chemical'
        ];

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $works_units = $works->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $restraints_chemical = RestraintChemical::all();

        return view('app.risk_chemical.create', compact('page', 'single_document','works_units','restraints_chemical'));
    }
}
