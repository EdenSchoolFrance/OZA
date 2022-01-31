<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function viewpdf(){

        //return view('app.pdf.index');

        return PDF::loadView('app.pdf.index')->setPaper('a4', 'landscape')->stream();
    }
    public static function create(){

        $data = [

            "date" => "18/09/2021",
            "firstname" => "Jeff",
            "lastname" => "Rollex",
            "sexe" => "M",
            "age" => "45",
            "context" => "Un test",
            "last_classroom" => "BTS Option mécanique",
            "job" => "Mécanicien",
            "test_version" => "RCC A/B",
            "calibration" => "Bonne question",
            "exemple_resp" => "3",
            "response" => "35",
            "rp" => "17,5",
            "response_verif" => "35"

        ];

        return PDF::loadView('app.pdf.index', compact('data'))
            ->setPaper('a4', 'landscape')
            ->download('ozaDuTest.pdf');
    }
}
