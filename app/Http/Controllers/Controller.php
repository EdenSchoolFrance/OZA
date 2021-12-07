<?php

namespace App\Http\Controllers;

use App\Models\Single_document;
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
            $single_document = Single_document::find($id);
        } else {
            $single_document = Auth::user()->single_documents->where('id', $id)->first();
        }

        if (!$single_document) {
            abort(404);
        }

        return $single_document;
    }
}
