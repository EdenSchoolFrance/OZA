<?php

namespace App\Imports;

use App\Models\Danger;
use App\Models\SdDanger;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
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

            $sd_danger = $this->lockDanger($collection[$i][4]);
            $sd_work_unit = $this->lockWorkUnit($collection[$i][3]);

            $data = [
                "danger" => $sd_danger,
                "work_unit" => $sd_work_unit,
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
        $frequency = "year+";
        $probability = "very weak";
        $gravity = "death";
        $impact = "null";

        for ($i = 0; $i < count($fre); $i++){
            if ($fre[$i] === $data["frequency"]){
                $frequency = $fre[$i];
            }
        }

        for ($i = 0; $i < count($pro); $i++){
            if ($pro[$i] === $data["probability"]){
                $probability = $pro[$i];
            }
        }

        for ($i = 0; $i < count($gra); $i++){
            if ($gra[$i] === $data["gravity"]){
                $gravity = $gra[$i];
            }
        }

        for ($i = 0; $i < count($imp); $i++){
            if ($imp[$i] === $data["impact"]){
                $impact = $imp[$i];
            }
        }

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $data["risk"];
        $sd_risk->frequency = $frequency;
        $sd_risk->probability = $probability;
        $sd_risk->gravity = $gravity;
        $sd_risk->impact = $impact;
        $sd_risk->sd_danger()->associate($data["danger"]);
        if ($data["work_unit"] !== null) $sd_risk->sd_work_unit()->associate($data["work_unit"]);
        $sd_risk->save();

        return $sd_risk;



    }

    protected function lockWorkUnit($data)
    {

        if ($data === "Tous"){
            return null;
        }else{
            $single_document = $this->single_document;
            $sd_work_unit = SdWorkUnit::where('name', $data)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->first();
            if (!$sd_work_unit) $this->deleteAll("WorkUnit introuvable");
            return $sd_work_unit;
        }

    }

    protected function lockDanger($data)
    {
        $single_document = $this->single_document;
        $danger = Danger::where('info', $data)->first();
        $sd_danger = SdDanger::where('danger_id', $danger->id)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$danger || !$sd_danger) $this->deleteAll("Danger introuvable !");
        return $sd_danger;
    }

    protected function deleteAll($dataError)
    {
        for ($i=0; $i < count($this->deleteAll); $i++) {
            SdRisk::where('id', $this->deleteAll[$i])->delete();
        }
        return back()->with('status', $dataError)->with('status_type','danger');
    }




}
