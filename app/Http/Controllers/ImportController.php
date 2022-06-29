<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RiskImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel' => 'nullable|mimes:xlsx,xlsm,xlsb,xltx,xltm,xls,xlt,xml,xlam,xla,xlw,xlr',
        ]);
        
        $import = new RiskImport();
        $import->onlySheets('4. EvR');

        Excel::import($import, $request->file('excel'));

    }
}
