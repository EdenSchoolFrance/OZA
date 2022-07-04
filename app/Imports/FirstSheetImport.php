<?php

namespace App\Imports;

use App\Models\Danger;
use App\Models\SdRisk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection
{
    private $single_document;
    private $deleteTab;

    /**
    * @param Collection $collection
    */
    public function __construct($single_document)
    {
        $this->single_document = $single_document;
        $this->deleteTab = [];
    }

    public function collection(Collection $collection)
    {
        //var_dump($this->single_document);
        //var_dump($collection[3][3]);
        for ($i=3; $i < count($collection); $i++) {
            /**
             * $danger = $collection[$i][4];
             * $work_unit = $collection[$i][3];
             * $risk = $collection[$i][5];
             * $frequency = $collection[$i][6];
             * $probability = $collection[$i][7];
             * $gravity = $collection[$i][8];
             * $impact = $collection[$i][9];
             */

            $this->lockDanger($collection[$i][3]);

            $data = [
                "risk" => $collection[$i][5],
                "frequency" => $collection[$i][6],
                "probability" => $collection[$i][7],
                "gravity" => $collection[$i][8],
                "impact" => $collection[$i][9],
                "restraint" => $collection[$i][11]
            ];
            $risk = $this->createRisk($data);

            $this->deleteTab[] = $risk->id;


        }
    }

    protected function createRisk($data)
    {

        $fre = [
            "jour" => "day",
            "semaine" => "week",
            "mois" => "mouth",
            "an" => "year",
            "< fois par an" => "year+"
        ];

        $pro = [
            "très élevée" => "very high",
            "élevée" => "high",
            "non faible" => "medium",
            "faible" => "weak",
            "très faible" => "very weak"
        ];

        $gra = [
            "décès" => "death",
            "IPP" => "ipp",
            "AAA" => "aaa",
            "ASA" => "asa",
            "impact faible" => "weak impact"
        ];

        $imp = [
            "NON" => "null",
            "F" => "female",
            "H" => "null"
        ];





    }

    protected function lockWorkUnit($data)
    {

    }

    protected function lockDanger($data)
    {
        $single_document = $this->single_document;
        $danger = Danger::where('info',$data)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$danger) $this->deleteAll("");
        return $danger;
    }

    protected function deleteAll($dataError)
    {
        for ($i=0; $i < count($this->deleteAll); $i++) {
            SdRisk::where('id', $this->deleteAll[$i])->delete();
        }
        return back()->with('status', $dataError)->with('status_type','danger');
    }




}
