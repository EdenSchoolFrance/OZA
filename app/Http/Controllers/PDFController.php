<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Item;
use App\Models\SdRisk;
use App\Models\SubItem;
use App\Models\Historie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function viewpdf($id)
    {
        //return view('app.pdf.index');
        $single_document = $this->checkSingleDocument($id);

        $item_mat = Item::where('name', 'Matériels')->first();
        $item_veh = Item::where('name', 'Véhicules')->first();
        $item_eng = Item::where('name', 'Engins')->first();

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->get();

        $sd_risks_posts = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->get()->filter(function ($sd_risk, $key) {
            return $sd_risk->total() > 23;
        })->all();
        setlocale(LC_TIME, "fr_FR");
        $histories = Historie::find(session('status'));

        $chartConfig = [
            'type' => 'outlabeledPie',
            'data' => [
                'labels' => ['Acceptable', 'A améliorer', 'Agir vite', 'STOP'],
                'datasets' => [
                    [
                        'backgroundColor' => ['#43A389', '#F9CA62', '#F8912A', '#B32A3C'],
                        'data' => $single_document->graphique(),
                        'borderWidth' => 0
                    ]
                ]
            ],
            'options' => [
                'plugins' => [
                    'outlabels' => [
                        'text' => "%p \n (%l)",
                        'color' => ['#43A389', '#F9CA62', '#F8912A', '#B32A3C'],
                        'backgroundColor' => 'transparent',
                        'lineColor' => 'transparent',
                        'stretch' => 20,
                        'font' => [
                            'resizable' => true,
                            'minSize' => 15,
                            'maxSize' => 18
                        ]
                    ]
                ],
                'legend' => [
                    'display' => true,
                    'position' => 'right',
                    'labels' => [
                        'boxWidth' => 45,
                        'padding' => 20
                    ]
                ]
            ]
        ];
        $chart = file_get_contents("https://quickchart.io/chart?w=500&h=300&c=" . urlencode(json_encode($chartConfig)));
        $chartUrl = storage_path('app/private/' . $single_document->client->id . '/chart.png');

        File::put($chartUrl, $chart);

        $pdf = PDF::loadView('app.pdf.index', compact('chartUrl', 'single_document', 'item_mat', 'item_veh', 'item_eng', 'sd_risks', 'sd_risks_posts'))->setPaper('a4', 'landscape');

        Storage::put('/private/' . $single_document->client->id . '/du/' . $histories->id . '.pdf', $pdf->download()->getOriginalContent());

        return back()->with('status', 'Document unique généré avec succès, vous pouvez maintenant le télécharger !');
    }

    public static function create()
    {

        $config = '{type:"pie",data:{labels:["Acceptable","A améliorer","Agir vite","STOP"],datasets:[{label:"",data:[75,25,0,0]}]},options:{layout:{padding:0,},plugins:{legend:{display:true,position:"right",labels:{boxHeight:45,boxWidth:45,},title:{display:false,}}}}}';
        $chartUrl = 'https://quickchart.io/chart?w=500&h=300&c=' . urlencode($config);
        return PDF::loadView('app.pdf.index', compact('chartUrl'))
            ->setPaper('a4', 'landscape')
            ->download('ozaDuTest.pdf');
    }
}
