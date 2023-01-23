<?php

namespace App\Http\Controllers;

use App\Models\SdRiskExplosion;
use Illuminate\Http\Request;

class RiskExplosionController extends Controller
{
    public function all($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Tous les risques',
            'infos' => null,
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'risk_all'
        ];

        $sd_risks = SdRiskExplosion::where('single_document_id', $single_document->id)->get();

        return view('app.risk.all', compact('page', 'single_document', 'sd_risks'));
    }
}
