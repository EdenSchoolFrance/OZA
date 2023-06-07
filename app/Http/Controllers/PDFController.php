<?php

namespace App\Http\Controllers;

use App\Models\Exposition;
use App\Models\PsychosocialQuestion;
use App\Models\SdPsychosocialGroup;
use App\Models\SdRestraintArchived;
use App\Models\SdRiskChemical;
use App\Models\SdRiskExplosion;
use App\Models\SingleDocument;
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
        $single_document = $this->checkSingleDocument($id); // All

        if ( !Storage::exists('private/' . $single_document->client->id ) )
            Storage::makeDirectory('private/' . $single_document->client->id, 0775, true );

        if (!Storage::exists('private/' . $single_document->client->id. '/temp'))
            Storage::makeDirectory('private/' . $single_document->client->id. '/temp', 0775, true );

        $this->Structure($single_document); // Structure

        $this->Part1($single_document); // Part 1

        $this->Part2($single_document); // Part 2

        $this->Part3($single_document); // Part 3

        $this->Part4($single_document); // Part 4

        $this->Part5($single_document); // Part 5

        if($single_document->risk_psycho)
            $this->Part7($single_document); // Part 7

        if ($single_document->risk_chemical)
            $this->Part8($single_document); // Part 8

        if ($single_document->risk_explosion)
            $this->Part9($single_document); // Part 9

        $this->Part10($single_document); // Part 10

        $this->Part11($single_document); // Part 11

        $this->MergePDF($single_document); // Merge PDF

//        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
//            $q->where('id', $single_document->id);
//        })->get();
//
//        $sd_dangers = SdDanger::whereHas('single_document', function ($q) use ($single_document) {
//            $q->where('id', $single_document->id);
//        })->get();
//
//
//        $item_mat = Item::where('name', 'Matériels')->first();
//        $item_veh = Item::where('name', 'Véhicules')->first();
//        $item_eng = Item::where('name', 'Engins')->first();
//
//        $sd_risks = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
//            $q->where('single_document_id', $single_document->id);
//        })->whereHas('sd_restraints', function ($q) {
//            $q->where('exist', 0);
//        })->get()->sortByDesc(function ($sd_risk, $key) {
//            if (isset($sd_risk->sd_restraints_exist[0]))
//                return $sd_risk->totalRR($sd_risk->sd_restraints_exist);
//            else
//                return $sd_risk->total();
//        });
//
//        $sd_risks_posts = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
//            $q->where('single_document_id', $single_document->id);
//        })->get()->sort(function ($a, $b){
//            return $b->total() - $a->total();
//        })->filter(function ($sd_risk, $key) {
//            return $sd_risk->total() > 23;
//        })->all();
//
//        $sd_risks_final = [];
//
//        $sd_works = $single_document->work_unit_pdf;
//
//        foreach($single_document->dangers->sortBy('danger.name') as $sd_danger) {
//
//            if (count($sd_works) > 1) {
//
//                $verif = $sd_danger->exist_risk();
//
//                if ($verif === false) {
//
//                    $item = [
//                        "info" => "all",
//                        "sd_work_unit" => "Tous",
//                        "sd_work_unit_name" => "Tous",
//                        "sd_danger" => $sd_danger,
//                        "sd_danger_name" => $sd_danger->danger->name,
//                        "sd_risks" => [],
//                    ];
//                    foreach ($sd_danger->sd_risks_ut_all() as $sd_risk) {
//                        $item["sd_risks"][] = $sd_risk;
//                    }
//                    $sd_risks_final[] = $item;
//
//                } else if ($verif === true && ($sd_danger->ut_all === 0 || $sd_danger->ut_all === null)) {
//
//                    foreach ($sd_works as $sd_work) {
//                        $item = [
//                            "info" => "notAll",
//                            "sd_work_unit" => $sd_work,
//                            "sd_work_unit_name" => $sd_work->name,
//                            "sd_danger" => $sd_danger,
//                            "sd_danger_name" => $sd_danger->danger->name,
//                            "sd_risks" => []
//                        ];
//                        foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
//                            $item["sd_risks"][] = $sd_risk;
//                        }
//                        $sd_risks_final[] = $item;
//                    }
//
//                } else if ($verif === true && $sd_danger->ut_all > 0) {
//
//                    $all = [
//                        "info" => "allAndDanger",
//                        "sd_work_unit" => "Tous",
//                        "sd_work_unit_name" => "Tous",
//                        "sd_danger" => $sd_danger,
//                        "sd_danger_name" => $sd_danger->danger->name,
//                        "sd_risks" => [],
//                    ];
//                    foreach ($sd_danger->sd_risks_ut_all() as $sd_risk) {
//                        $all["sd_risks"][] = $sd_risk;
//                    }
//                    $sd_risks_final[] = $all;
//
//                    foreach ($sd_works as $sd_work) {
//                        if (count($sd_work->sd_danger_risks($sd_danger->id)) > 0) {
//                            $item = [
//                                "info" => "allAndDanger",
//                                "sd_work_unit" => $sd_work,
//                                "sd_work_unit_name" => $sd_work->name,
//                                "sd_danger" => $sd_danger,
//                                "sd_danger_name" => $sd_danger->danger->name,
//                                "sd_risks" => []
//                            ];
//                            foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
//                                $item["sd_risks"][] = $sd_risk;
//                            }
//                            $sd_risks_final[] = $item;
//                        }
//                    }
//                }
//            }else{
//
//                foreach ($sd_works as $sd_work) {
//                    $item = [
//                        "info" => "notAll",
//                        "sd_work_unit" => $sd_work,
//                        "sd_work_unit_name" => $sd_work->name,
//                        "sd_danger" => $sd_danger,
//                        "sd_danger_name" => $sd_danger->danger->name,
//                        "sd_risks" => []
//                    ];
//                    foreach ($sd_work->sd_danger_risks($sd_danger->id) as $sd_risk) {
//                        $item["sd_risks"][] = $sd_risk;
//                    }
//                    $sd_risks_final[] = $item;
//                }
//
//            }
//        }
//
//        $final = array_multisort(
//            array_column($sd_risks_final, 'sd_work_unit_name'),  SORT_NATURAL|SORT_FLAG_CASE,
//            array_column($sd_risks_final, 'sd_danger_name'), SORT_NATURAL|SORT_FLAG_CASE,
//            $sd_risks_final);
//

//        //dd($sd_risks_final);
//
//        $dangers = $single_document->dangers()->whereHas('danger.exposition')->get();
//
//
//        $numberEmUt = 0;
//        $numberEmExpo = 0;
//        foreach ($works as $work){
//            $numberEmUt = $numberEmUt + $work->number_employee;
//
//            $expos_questions = SdExpositionQuestion::whereHas('sd_work_unit', function ($q) use ($work) {
//                $q->where('sd_work_unit_id', $work->id);
//            })->get();
//
//            foreach ($expos_questions as $expo_question){
//                $numberEmExpo = $numberEmExpo + $expo_question->number_employee;
//            }
//        }
//
//        $expos = Exposition::all()->sortBy("danger.name",SORT_NATURAL|SORT_FLAG_CASE);
//
//
//        $sd_risks_v2 = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
//            $q->where('single_document_id', $single_document->id);
//        })->whereHas('sd_restraints', function ($q) {
//            $q->where('exist', 1)->whereNotNull('date');
//        })->get();
//
//
//        //Psycho
//
//        $psychosocial_groups = null;
//        $questions = null;
//
//        if ($single_document->risk_psycho){
//
//            $psychosocial_groups = SdPsychosocialGroup::whereHas('single_document', function ($q) use ($single_document){
//                $q->where('id', $single_document->id);
//            })->get();
//
//            $questions = PsychosocialQuestion::all();
//        }
//
//        $sd_restraints_archived = SdRestraintArchived::where('single_document_id', $id)->get();
//
//
//        $sd_risks_chemicals = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
//            $q->where('id', $single_document->id);
//        })->get()->sort(function ($a, $b){
//            return $b->IR() - $a->IR();
//        })->all();
//
//        $sd_risks_explosions = SdRiskExplosion::where('single_document_id', $single_document->id)->get();
//
//
//        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
//        $histories = Historie::find(session('status'));
//
//        $date = Carbon::now('Europe/Paris')->translatedFormat('d F Y');
//
//        $chartConfig = [
//            'type' => 'outlabeledPie',
//            'data' => [
//                'labels' => ['Acceptable', 'A améliorer', 'Agir vite', 'STOP'],
//                'datasets' => [
//                    [
//                        'backgroundColor' => ["#43A389", "#F8912A","#FF7D8E","#B32A3C"],
//                        'data' => $single_document->graphique(),
//                        'borderWidth' => 0
//                    ]
//                ]
//            ],
//            'options' => [
//                'plugins' => [
//                    'outlabels' => [
//                        'text' => "%p \n (%l)",
//                        'color' => ["#43A389", "#F8912A","#FF7D8E","#B32A3C"],
//                        'backgroundColor' => 'transparent',
//                        'lineColor' => 'transparent',
//                        'stretch' => 20,
//                        'font' => [
//                            'resizable' => true,
//                            'minSize' => 13,
//                            'maxSize' => 13
//                        ]
//                    ]
//                ],
//                'legend' => [
//                    'display' => true,
//                    'position' => 'right',
//                    'labels' => [
//                        'boxWidth' => 45,
//                        'padding' => 20
//                    ]
//                ]
//            ]
//        ];
//
//
//        if (!function_exists('curl_init'))
//        {
//            die('CURL is not installed!');
//        }
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://quickchart.io/chart?w=650&h=600&c=" . urlencode(json_encode($chartConfig)));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $chart = curl_exec($ch);
//        curl_close($ch);
//
//        //$chart = file_get_contents("https://quickchart.io/chart?w=500&h=300&c=" . urlencode(json_encode($chartConfig)));
//        $chartUrl = storage_path('app/private/' . $single_document->client->id . '/chart.png');
//
//        File::put($chartUrl, $chart);
//
//        $pdf = PDF::loadView('app.pdf.index',
//            compact(
//            'chartUrl',
//            'single_document',
//            'item_mat',
//            'item_veh',
//            'item_eng',
//            'sd_risks',
//            'sd_risks_posts',
//            'numberEmUt',
//            'numberEmExpo',
//            'expos',
//            'date',
//            'sd_dangers',
//            'works',
//            'dangers',
//            'works_units',
//            'sd_risks_final',
//            'sd_risks_v2',
//            'psychosocial_groups',
//            'questions',
//            'sd_restraints_archived',
//            'sd_risks_chemicals',
//            'sd_risks_explosions')
//        )->setPaper('a4', 'landscape');
//
//        //return $pdf->stream();
//
//        Storage::put('/private/' . $single_document->client->id . '/du/' . $histories->id . '.pdf', $pdf->download()->getOriginalContent());
//
//        Storage::deleteDirectory('private/' . $single_document->client->id. '/temp');

        return back()->with('status', 'Document unique généré avec succès, vous pouvez maintenant le télécharger !');
    }


    public function Structure(SingleDocument $single_document){

        $sd_works_units = $single_document->work_unit_pdf;

        $works_units = $sd_works_units->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $date = Carbon::now('Europe/Paris')->translatedFormat('d F Y');

        $item_mat = Item::where('name', 'Matériels')->first();
        $item_veh = Item::where('name', 'Véhicules')->first();
        $item_eng = Item::where('name', 'Engins')->first();

        $pdf = PDF::loadview('app.pdf.structure',
            compact(
                'single_document',
                'works_units',
                'date',
                'item_mat',
                'item_veh',
                'item_eng'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_structure.pdf', $pdf->download()->getOriginalContent());
    }

    public function Part1(SingleDocument $single_document){

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

        $chartUrl = storage_path('app/private/' . $single_document->client->id . '/chart.png');

        File::put($chartUrl, $chart);


        $pdf = PDF::loadview('app.pdf.part1',
            compact(
                'single_document',
                'chartUrl'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part1.pdf', $pdf->download()->getOriginalContent());
    }

    public function Part2(SingleDocument $single_document){

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

        $pdf = PDF::loadview('app.pdf.part2',
            compact(
                'single_document',
                'sd_risks'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part2.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part3(SingleDocument $single_document){

        $pdf = PDF::loadview('app.pdf.part3',
            compact(
                'single_document'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part3.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part4(SingleDocument $single_document){

        $pdf = PDF::loadview('app.pdf.part4',
            compact(
                'single_document'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part4.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part5(SingleDocument $single_document){


        $sd_risks_posts = SdRisk::whereHas('sd_danger', function ($q) use ($single_document) {
            $q->where('single_document_id', $single_document->id);
        })->get()->sort(function ($a, $b){
            return $b->total() - $a->total();
        })->filter(function ($sd_risk, $key) {
            return $sd_risk->total() > 23;
        })->all();


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


        $pdf = PDF::loadview('app.pdf.part5',
            compact(
                'single_document',
                'sd_risks_posts',
                'sd_risks_final'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part5.pdf', $pdf->download()->getOriginalContent());

    }


    public function Part7(SingleDocument $single_document){


        $psychosocial_groups = null;
        $questions = null;

        if ($single_document->risk_psycho){

            $psychosocial_groups = SdPsychosocialGroup::whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->get();

            $questions = PsychosocialQuestion::all();
        }

        $pdf = PDF::loadview('app.pdf.part7',
            compact(
                'single_document',
                'psychosocial_groups',
                'questions'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part7.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part8(SingleDocument $single_document){


        $sd_risks_chemicals = SdRiskChemical::whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->get()->sort(function ($a, $b){
            return $b->IR() - $a->IR();
        })->all();


        $pdf = PDF::loadview('app.pdf.part8',
            compact(
                'single_document',
                'sd_risks_chemicals'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part8.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part9(SingleDocument $single_document){

        $sd_risks_explosions = SdRiskExplosion::where('single_document_id', $single_document->id)->get();

        $pdf = PDF::loadview('app.pdf.part9',
            compact(
                'single_document',
                'sd_risks_explosions'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part9.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part10(SingleDocument $single_document){

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($single_document) {
            $q->where('id', $single_document->id);
        })->get();

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


        $pdf = PDF::loadview('app.pdf.part10',
            compact(
                'single_document',
                'numberEmUt',
                'numberEmExpo',
                'expos'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part10.pdf', $pdf->download()->getOriginalContent());

    }

    public function Part11(SingleDocument $single_document){

        $sd_restraints_archived = SdRestraintArchived::where('single_document_id', $single_document->id)->get();

        $sd_risks_v2 = SdRisk::whereHas('sd_danger', function ($q) use ($single_document){
            $q->where('single_document_id', $single_document->id);
        })->whereHas('sd_restraints', function ($q) {
            $q->where('exist', 1)->whereNotNull('date');
        })->get();

        $pdf = PDF::loadview('app.pdf.part11',
            compact(
                'single_document',
                'sd_restraints_archived',
                'sd_risks_v2'
            )
        )->setPaper('a4', 'landscape');

        $histories = Historie::find(session('status'));

        Storage::put('/private/' . $single_document->client->id . '/temp/' . $histories->id . '_part11.pdf', $pdf->download()->getOriginalContent());

    }


    public function MergePDF(SingleDocument $single_document){

        $histories = Historie::find(session('status'));

        $AllPDFFile = [
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_structure.pdf'),
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part1.pdf'),
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part2.pdf'),
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part3.pdf'),
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part4.pdf'),
            storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part5.pdf')
        ];

        if($single_document->risk_psycho)
            $AllPDFFile[] = storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part7.pdf');

        if ($single_document->risk_chemical)
            $AllPDFFile[] = storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part8.pdf');

        if ($single_document->risk_explosion)
            $AllPDFFile[] = storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part9.pdf');

        $AllPDFFile[] = storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part10.pdf');
        $AllPDFFile[] = storage_path('app/private/'. $single_document->client->id. '/temp/'. $histories->id . '_part11.pdf');

        $datadir = storage_path('app/private/'. $single_document->client->id . '/du/');
        $outputName = $datadir. $histories->id . '.pdf';

        $cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=$outputName ";
        //Add each pdf file to the end of the command
        foreach($AllPDFFile as $file) {
            $cmd .= $file." ";
        }
        $result = shell_exec($cmd);

        Storage::deleteDirectory('private/' . $single_document->client->id. '/temp');

    }
}
