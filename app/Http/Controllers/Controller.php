<?php

namespace App\Http\Controllers;

use App\Models\SingleDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function checkSingleDocument($id)
    {
        if (Auth::user()->oza) {
            $single_document = SingleDocument::find($id);
        } else {
            $single_document = Auth::user()->single_documents()->where('id', $id)->where('archived', 0)->first();
        }

        if (!$single_document) {
            abort(404);
        }

        return $single_document;
    }

    protected function checkRiskChemical(SingleDocument $sd){

        if ($sd->risk_chemical === 0){
            abort(404);
        }
        return true;

    }

    protected function checkRiskExplosion(SingleDocument $sd){

        if ($sd->risk_explosion){
            return true;
        }else{
            abort(404);
        }

    }
}
