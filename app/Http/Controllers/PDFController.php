<?php

namespace App\Http\Controllers;

use App\Models\Exposition;
use App\Models\PsychosocialQuestion;
use App\Models\SdPsychosocialGroup;
use App\Models\SdRestraintArchived;
use App\Models\SdRiskChemical;
use App\Models\SdRiskExplosion;
use PDF;
use App\Models\Item;
use App\Models\SdRisk;
use App\Models\Historie;
use App\Models\SdDanger;
use App\Models\SdExpositionQuestion;
use App\Models\SdWorkUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function viewpdf($id)
    {
        $single_document = $this->checkSingleDocument($id);
        $single_document->loadMissing(
            'work_unit_pdf.sd_risks',
            'dangers.danger',
            'dangers.sd_works_units',
            'dangers.sd_risk.sd_restraints'
        );

        $items = Item::with('sub_items')
            ->whereIn('name', ['Matériels', 'Véhicules', 'Engins'])
            ->get();
        $item_mat = $items->where('name', 'Matériels')->first();
        $item_veh = $items->where('name', 'Véhicules')->first();
        $item_eng = $items->where('name', 'Engins')->first();


        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })
        ->with(['sd_restraints', 'sd_work_unit', 'sd_danger.danger'])
        ->get()
        ->sortByDesc(function ($sd_risk, $key) {
            $existSDRestraints = $sd_risk->sd_restraints->where('exist', 1);
            return count($existSDRestraints)
                        ? $sd_risk->totalRR($existSDRestraints)
                        : $sd_risk->total();
        });

        $sd_risks_posts = $sd_risks
            ->filter(function ($sd_risk, $key) {
                return $sd_risk->total() > 23;
            })
            ->sort(function ($a, $b){
                return $b->total() - $a->total();
            })
            ->all();

        

        $sd_dangers = SdDanger::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $sd_works_units = $single_document->work_unit_pdf;

        $works_units = $sd_works_units->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $sd_risks_final = [];

        $sd_works = $single_document->work_unit_pdf;

        $singDocumentSdDangers = $single_document->dangers->sortBy('danger.name');
        
        foreach($singDocumentSdDangers as $sd_danger) {
            if (count($sd_works) > 1) {

                $verif = $sd_danger->exist_risk();

                if ($verif === false) {

                    $item = [
                        "info" => "all",
                        "sd_work_unit" => "Tous",
                        "sd_work_unit_name" => "Tous",
                        "sd_danger" => $sd_danger,
                        "sd_danger_name" => $sd_danger->danger->name,
                        "sd_risks" => [],
                    ];
                    foreach ($sd_danger->sd_risks_ut_all() as $sd_risk) {
                        $item["sd_risks"][] = $sd_risk;
                    }
                    $sd_risks_final[] = $item;

                } else if ($verif === true && ($sd_danger->ut_all === 0 || $sd_danger->ut_all === null)) {

                    foreach ($sd_works as $sd_work) {
                        $item = [
                            "info" => "notAll",
                            "sd_work_unit" => $sd_work,
                            "sd_work_unit_name" => $sd_work->name,
                            "sd_danger" => $sd_danger,
                            "sd_danger_name" => $sd_danger->danger->name,
                            "sd_risks" => []
                        ];
                        foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
                            $item["sd_risks"][] = $sd_risk;
                        }
                        $sd_risks_final[] = $item;
                    }

                } else if ($verif === true && $sd_danger->ut_all > 0) {

                    $all = [
                        "info" => "allAndDanger",
                        "sd_work_unit" => "Tous",
                        "sd_work_unit_name" => "Tous",
                        "sd_danger" => $sd_danger,
                        "sd_danger_name" => $sd_danger->danger->name,
                        "sd_risks" => [],
                    ];
                    foreach ($sd_danger->sd_risks_ut_all() as $sd_risk) {
                        $all["sd_risks"][] = $sd_risk;
                    }
                    $sd_risks_final[] = $all;
    
                    foreach ($sd_works as $sd_work) {
                        if (count($sd_work->sd_danger_risks($sd_danger->id)) > 0) {
                            $item = [
                                "info" => "allAndDanger",
                                "sd_work_unit" => $sd_work,
                                "sd_work_unit_name" => $sd_work->name,
                                "sd_danger" => $sd_danger,
                                "sd_danger_name" => $sd_danger->danger->name,
                                "sd_risks" => []
                            ];
                            foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
                                $item["sd_risks"][] = $sd_risk;
                            }
                            $sd_risks_final[] = $item;
                        }
                    }
                }
            }else{
                foreach ($sd_works as $sd_work) {
                    $item = [
                        "info" => "notAll",
                        "sd_work_unit" => $sd_work,
                        "sd_work_unit_name" => $sd_work->name,
                        "sd_danger" => $sd_danger,
                        "sd_danger_name" => $sd_danger->danger->name,
                        "sd_risks" => []
                    ];
                    foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
                        $item["sd_risks"][] = $sd_risk;
                    }
                    $sd_risks_final[] = $item;
                }
            }
        }

        // dd($sd_risks_final);

        $final = array_multisort(
            array_column($sd_risks_final, 'sd_work_unit_name'),  SORT_NATURAL|SORT_FLAG_CASE,
            array_column($sd_risks_final, 'sd_danger_name'), SORT_NATURAL|SORT_FLAG_CASE,
            $sd_risks_final);


        $dangers = $single_document->dangers()->whereHas('danger.exposition')->get();

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $numberEmUt = $works->sum('number_employee');
        $numberEmExpo = (int) SdExpositionQuestion::
            whereHas('sd_work_unit', fn ($q) =>
                $q->whereIn('sd_work_unit_id', $works->pluck('id'))
            )->sum('number_employee');
        
        
        $expos = Exposition::with('danger')
            ->get()
            ->sortBy("danger.name",SORT_NATURAL|SORT_FLAG_CASE);


        $sd_risks_restraints_count = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 1)->whereNotNull('date');
        })->count();


        //Psycho

        $psychosocial_groups = null;
        $questions = null;

        if ($single_document->risk_psycho){

            $psychosocial_groups = SdPsychosocialGroup::whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->get();

            $questions = PsychosocialQuestion::all();
        }

        $sd_restraints_archived = SdRestraintArchived::where('single_document_id', $id)->get();


        $sd_risks_chemicals = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->get()->sort(function ($a, $b){
            return $b->IR() - $a->IR();
        })->all();

        $sd_risks_explosions = SdRiskExplosion::where('single_document_id', $single_document->id)->get();


        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        $histories = Historie::find(session('status'));

        $date = Carbon::now('Europe/Paris')->translatedFormat('d F Y');

        $chartConfig = [
            'type' => 'outlabeledPie',
            'data' => [
                'labels' => ['Acceptable', 'A améliorer', 'Agir vite', 'STOP'],
                'datasets' => [
                    [
                        'backgroundColor' => ["#43A389", "#F8912A","#FF7D8E","#B32A3C"],
                        'data' => $single_document->graphique(),
                        'borderWidth' => 0
                    ]
                ]
            ],
            'options' => [
                'plugins' => [
                    'outlabels' => [
                        'text' => "%p \n (%l)",
                        'color' => ["#43A389", "#F8912A","#FF7D8E","#B32A3C"],
                        'backgroundColor' => 'transparent',
                        'lineColor' => 'transparent',
                        'stretch' => 20,
                        'font' => [
                            'resizable' => true,
                            'minSize' => 13,
                            'maxSize' => 13
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


        if (!function_exists('curl_init'))
        {
            die('CURL is not installed!');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://quickchart.io/chart?w=650&h=600&c=" . urlencode(json_encode($chartConfig)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $chart = curl_exec($ch);
        curl_close($ch);

        if ( !Storage::exists('private/' . $single_document->client->id ) ) {
            Storage::makeDirectory('private/' . $single_document->client->id, 0775, true );
        }
        $chartUrl = storage_path('app/private/' . $single_document->client->id . '/chart.png');

        File::put($chartUrl, $chart);

        $pdf = PDF::loadView('app.pdf.index',
            compact(
            'chartUrl',
            'single_document',
            'item_mat',
            'item_veh',
            'item_eng',
            'sd_risks',
            'sd_risks_posts',
            'numberEmUt',
            'numberEmExpo',
            'expos',
            'date',
            'sd_dangers',
            'works',
            'dangers',
            'works_units',
            'sd_risks_final',
            'sd_risks_restraints_count',
            'psychosocial_groups',
            'questions',
            'sd_restraints_archived',
            'sd_risks_chemicals',
            'sd_risks_explosions')
        )->setPaper('a4', 'landscape');

        return $pdf->stream();

        Storage::put('/private/' . $single_document->client->id . '/du/' . $histories->id . '.pdf', $pdf->download()->getOriginalContent());

        return back()->with('status', 'Document unique généré avec succès, vous pouvez maintenant le télécharger !');
    }
}
