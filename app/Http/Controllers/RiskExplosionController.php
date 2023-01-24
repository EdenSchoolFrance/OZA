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
            'title' => 'Evaluation du risque d\'explosion',
            'infos' => null,
            'sidebar' => 'risk_explosion'
        ];

        $sd_risks = SdRiskExplosion::where('single_document_id', $single_document->id)->get();

        return view('app.risk_explosion.index', compact('page', 'single_document', 'sd_risks'));
    }
}
