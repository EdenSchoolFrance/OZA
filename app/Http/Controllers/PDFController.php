<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SubItem;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function viewpdf($id){
        //return view('app.pdf.index');
        $single_document = $this->checkSingleDocument($id);

        $item_mat = Item::where('name','Matériels')->first();
        $item_veh = Item::where('name','Véhicules')->first();
        $item_eng = Item::where('name','Engins')->first();

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{data:[75,25,1,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?&w=500&h=300&c='.urlencode($config);
        return PDF::loadView('app.pdf.index', compact('chartUrl','single_document','item_mat','item_veh','item_eng'))->setPaper('a4', 'landscape')->stream();
    }

    public static function create(){

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{label:"",data:[75,25,0,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?w=500&h=300&c='.urlencode($config);
        return PDF::loadView('app.pdf.index', compact('chartUrl'))
            ->setPaper('a4', 'landscape')
            ->download('ozaDuTest.pdf');
    }
}
