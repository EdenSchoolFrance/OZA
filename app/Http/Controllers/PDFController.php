<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function viewpdf(){
        //return view('app.pdf.index');
        $data_1 = 46;
        $data_2 = 38;
        $data_3 = 15;
        $data_4 = 1;

        $url = "https://quickchart.io/chart?v=3&c=%7B%0A%20%20%22type%22%3A%20%22pie%22%2C%0A%20%20%22data%22%3A%20%7B%0A%20%20%20%20%22labels%22%3A%20%5B%22Acceptable%22%2C%20%22A%20am%C3%A9liorer%22%2C%20%22Agir%20vite%22%2C%20%22STOP%22%5D%2C%0A%20%20%20%20%22datasets%22%3A%20%5B%0A%20%20%20%20%20%20%20%20%7B%0A%20%20%20%20%20%20%20%20%20%20%22label%22%3A%20%22%22%2C%0A%20%20%20%20%20%20%20%20%20%20%22backgroundColor%22%3A%20%5B%22%2343A389%22%2C%20%22%23F9CA62%22%2C%22%23F8912A%22%2C%22%23B32A3C%22%5D%2C%0A%20%20%20%20%20%20%20%20%20%20%22data%22%3A%20%5B" . $data_1 . "%2C%20" . $data_2 . "%2C%20" . $data_3 . "%2C%20" . $data_4 . "%5D%2C%0A%20%20%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%5D%2C%0A%20%20%7D%2C%0A%20%20%22options%22%3A%20%7B%0A%20%20%20%20%22layout%22%3A%20%7B%0A%20%20%20%20%20%20%22padding%22%3A%200%2C%0A%20%20%20%20%7D%2C%0A%20%20%20%20%22plugins%22%3A%20%7B%0A%20%20%20%20%20%20%22datalabels%22%3A%20%7B%0A%20%20%20%20%20%20%20%20%22display%22%3A%20true%2C%0A%20%20%20%20%20%20%20%20%22formatter%22%3A%20(val%2C%20ctx)%20%3D%3E%20%7B%0A%20%20%20%20%20%20%20%20%20%20return%20val%20%2B%20%22%25%22%3B%0A%20%20%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20%20%20%22align%22%3A%20%27center%27%2C%0A%20%20%20%20%20%20%20%20%22color%22%3A%20%22white%22%2C%0A%20%20%20%20%20%20%20%20%22padding%22%3A%205%2C%0A%20%20%20%20%20%20%20%20%22borderRadius%22%3A%202%2C%0A%20%20%20%20%20%20%20%20%22backgroundColor%22%3A%20%27%23404040%27%2C%0A%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20%22legend%22%3A%20%7B%0A%20%20%20%20%20%20%20%20%22display%22%3A%20true%2C%0A%20%20%20%20%20%20%20%20%22position%22%20%3A%20%27right%27%2C%0A%20%20%20%20%20%20%20%20%22labels%22%20%3A%20%7B%0A%20%20%20%20%20%20%20%20%20%20%22boxHeight%22%20%3A%2045%2C%0A%20%20%20%20%20%20%20%20%20%20%22boxWidth%22%20%3A%2045%2C%0A%20%20%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%20%20%7D%2C%0A%20%20%20%20%7D%0A%20%20%7D%0A%7D";

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{data:[75,25,1,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?&w=500&h=300&c='.urlencode($config);
        return PDF::loadView('app.pdf.index', compact('chartUrl'))->setPaper('a4', 'landscape')->stream();
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

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{label:"",data:[75,25,0,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?w=500&h=300&c='.urlencode($config);
        return PDF::loadView('app.pdf.index', compact('data','chartUrl'))
            ->setPaper('a4', 'landscape')
            ->download('ozaDuTest.pdf');
    }
}
