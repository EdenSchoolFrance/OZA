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
use App\Models\SubItem;
use App\Models\Historie;
use App\Models\SdDanger;
use App\Models\SdExpositionQuestion;
use App\Models\SdWorkUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function viewpdf($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $item_mat = Item::where('name', 'Matériels')->first();
        $item_veh = Item::where('name', 'Véhicules')->first();
        $item_eng = Item::where('name', 'Engins')->first();

        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 0);
        })->get()->sortByDesc(function ($sd_risk, $key) {
            if (isset($sd_risk->sd_restraints_exist[0]))
                return $sd_risk->totalRR($sd_risk->sd_restraints_exist);
            else
                return $sd_risk->total();
        });

        $sd_risks_posts = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->get()->sort(function ($a, $b){
            return $b->total() - $a->total();
        })->filter(function ($sd_risk, $key) {
            return $sd_risk->total() > 23;
        })->all();

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $sd_dangers = SdDanger::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

        $sd_works_units = $single_document->work_unit_pdf;

        $works_units = $sd_works_units->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $sd_risks_final = [];

        $sd_works = $single_document->work_unit_pdf;

        foreach($single_document->dangers->sortBy('danger.name') as $sd_danger) {

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

        $final = array_multisort(
            array_column($sd_risks_final, 'sd_work_unit_name'),  SORT_NATURAL|SORT_FLAG_CASE,
            array_column($sd_risks_final, 'sd_danger_name'), SORT_NATURAL|SORT_FLAG_CASE,
            $sd_risks_final);


        //dd($sd_risks_final);

        $dangers = $single_document->dangers()->whereHas('danger.exposition')->get();


        $numberEmUt = 0;
        $numberEmExpo = 0;
        foreach ($works as $work){
            $numberEmUt = $numberEmUt + $work->number_employee;

            $expos_questions = SdExpositionQuestion::whereHas('sd_work_unit', function ($q) use ($work) {
                $q->where('sd_work_unit_id', $work->id);
            })->get();

            foreach ($expos_questions as $expo_question){
                $numberEmExpo = $numberEmExpo + $expo_question->number_employee;
            }
        }

        $expos = Exposition::all()->sortBy("danger.name",SORT_NATURAL|SORT_FLAG_CASE);


        $sd_risks_v2 = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 1)->whereNotNull('date');
        })->get();


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
        curl_setopt($ch, CURLOPT_URL, "https://quickchart.io/chart?w=500&h=450&c=" . urlencode(json_encode($chartConfig)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $chart = curl_exec($ch);
        curl_close($ch);

        //$chart = file_get_contents("https://quickchart.io/chart?w=500&h=300&c=" . urlencode(json_encode($chartConfig)));
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
            'sd_risks_v2',
            'psychosocial_groups',
            'questions',
            'sd_restraints_archived',
            'sd_risks_chemicals',
            'sd_risks_explosions')
        )->setPaper('a4', 'landscape');

        //return $pdf->stream();

        Storage::put('/private/' . $single_document->client->id . '/du/' . $histories->id . '.pdf', $pdf->download()->getOriginalContent());

        return back()->with('status', 'Document unique généré avec succès, vous pouvez maintenant le télécharger !');
    }
}
