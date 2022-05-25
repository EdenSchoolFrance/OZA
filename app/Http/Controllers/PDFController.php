<?php

namespace App\Http\Controllers;

use App\Models\Historie;
use App\Models\Item;
use App\Models\SdRisk;
use App\Models\SubItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->get();

        $sd_risks_posts = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->get()->filter(function ($sd_risk, $key) {
            return $sd_risk->total() > 23;
        })->all();
        setlocale(LC_TIME, "fr_FR");
        $histories = Historie::find(session('status'));

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{data:['.$single_document->graphique()[0].','.$single_document->graphique()[1].','.$single_document->graphique()[2].','.$single_document->graphique()[3].']}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?&w=500&h=300&c='.urlencode($config);
        $pdf = PDF::loadView('app.pdf.index', compact('chartUrl','single_document','item_mat','item_veh','item_eng','sd_risks','sd_risks_posts'))->setPaper('a4', 'landscape');

        Storage::put('/private/'.$single_document->client->id.'/du/'.$histories->id.'.pdf', $pdf->download()->getOriginalContent());

        return back()->with('status', 'Document unique générer avec succès, vous pouvez maintenant le télécharger !');
    }

    public static function create(){

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{label:"",data:[75,25,0,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?w=500&h=300&c='.urlencode($config);
        return PDF::loadView('app.pdf.index', compact('chartUrl'))
            ->setPaper('a4', 'landscape')
            ->download('ozaDuTest.pdf');
    }
}
