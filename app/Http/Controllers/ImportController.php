<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RiskImport;
use App\Models\Client;
use App\Models\SingleDocument;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importExcel(Request $request,Client $client, SingleDocument $single_document)
    {
        $request->validate([
            'excel' => 'nullable|mimes:xlsx,xlsm,xlsb,xltx,xltm,xls,xlt,xml,xlam,xla,xlw,xlr',
        ]);
        
        $import = new RiskImport($single_document);
        

        Excel::import($import, $request->file('excel'));

    }

}
