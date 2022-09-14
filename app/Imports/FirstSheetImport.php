<?php

namespace App\Imports;

use App\Models\ErrorExcel;
use App\Models\SdDanger;
use App\Models\SdRestraint;
use App\Models\SdRisk;
use App\Models\SdWorkUnit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

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

        for ($i=3; $i < count($collection); $i++) {

            $sd_danger = $this->lockDanger($collection[$i][4]);
            if ($sd_danger === null){
                $this->error("Danger introuvable", $i);
                continue;
            }
            $sd_work_unit = $this->lockWorkUnit($collection[$i][3]);
            if ($sd_work_unit === null){
                $this->error("Unité de travail introuvable", $i);
                continue;
            }

            $data = [
                "danger" => $sd_danger,
                "work_unit" => $sd_work_unit,
                "risk" => $collection[$i][7],
                "frequency" => $collection[$i][8],
                "probability" => $collection[$i][9],
                "gravity" => $collection[$i][10],
                "impact" => $collection[$i][11],
                "restraint_exist" => $collection[$i][13],
                "tech" => $collection[$i][14],
                "orga" => $collection[$i][15],
                "human" => $collection[$i][16],
                "restraint" => $collection[$i][26]
            ];

            if ($sd_danger->exist === null){
                $sd_danger->exist = 1;
                $sd_danger->save();
            }
            if ($sd_work_unit === false){
                $sd_danger->ut_all = 1;
                $sd_danger->save();
            }else{
                if ($sd_danger->sd_works_units()->where('sd_work_unit_id', $sd_work_unit->id)->first()){
                    $sd_danger->sd_works_units()->updateExistingPivot($sd_work_unit->id, [
                        'exist' => 1
                    ]);
                } else {
                    $sd_danger->sd_works_units()->attach($sd_work_unit, ['exist' => 1]);
                }
            }



            $risk = $this->createRisk($data);

            $this->deleteTab[] = $risk->id;

        }

        return back()->with('status', "Import terminé");
    }

    protected function createRisk($data)
    {

        $fre = [
            "jour" => "day",
            "semaine" => "week",
            "mois" => "mouth",
            "an" => "year",
            "< 1 fois par an" => "year+",
            "non concerné" => "year+"
        ];

        $pro = [
            "très élevée" => "very high",
            "élevée" => "high",
            "non faible" => "medium",
            "faible" => "weak",
            "très faible" => "very weak",
            "non concerné" => "very weak"
        ];

        $gra = [
            "décès" => "death",
            "IPP" => "ipp",
            "AAA" => "aaa",
            "ASA" => "asa",
            "impact faible" => "weak impact",
            "non concerné" => "weak impact"
        ];

        $imp = [
            "NON" => "null",
            "F" => "female",
            "H" => "null"
        ];

        $frequency = $fre[$data["frequency"]];
        $probability = $pro[$data["probability"]];
        $gravity = $gra[$data["gravity"]];
        $impact = $imp[$data["impact"]];

        $sd_risk = new SdRisk();
        $sd_risk->id = uniqid();
        $sd_risk->name = $data["risk"];
        $sd_risk->frequency = $frequency;
        $sd_risk->probability = $probability;
        $sd_risk->gravity = $gravity;
        $sd_risk->impact = $impact;
        $sd_risk->sd_danger()->associate($data["danger"]);
        if (!empty($data["work_unit"])) $sd_risk->sd_work_unit()->associate($data["work_unit"]);
        $sd_risk->save();

        if (!empty($data["restraint_exist"])) $this->restraintExist($data, $sd_risk);
        if (!empty($data["restraint"])) $this->restraint($data, $sd_risk);


        return $sd_risk;

    }

    protected function restraintExist($data, $sd_risk)
    {

        $restraint_exist = explode("*", $data["restraint_exist"]);

        $tabValue = [
            "très bon" => "very good",
            "bon" => "good",
            "moy" => "medium",
            "0" => "null"
        ];

        $tech = $tabValue[$data["tech"]];
        $orga = $tabValue[$data["orga"]];
        $human = $tabValue[$data["human"]];


        for ($i = 1; $i < count($restraint_exist); $i++){
            $name = $restraint_exist[$i];
            if (strpos(substr($name, 0, 1), ' ') !== FALSE) {
                $name = substr($name, 1);
            }

            $sd_restraint = new SdRestraint();
            $sd_restraint->id = uniqid();
            $sd_restraint->name = $name;
            $sd_restraint->technical = $tech;
            $sd_restraint->organizational = $orga;
            $sd_restraint->human = $human;
            $sd_restraint->exist = true;
            $sd_restraint->sd_risk()->associate($sd_risk);
            $sd_restraint->save();
        }
    }

    protected function restraint($data, $sd_risk)
    {

        $restraint = explode("*", $data["restraint"]);

        for ($i = 1; $i < count($restraint); $i++){
            $name = $restraint[$i];
            if (strpos(substr($name, 0, 1), ' ') !== FALSE) {
                $name = substr($name, 1);
            }

            $sd_restraint = new SdRestraint();
            $sd_restraint->id = uniqid();
            $sd_restraint->name = $name;
            $sd_restraint->exist = false;
            $sd_restraint->sd_risk()->associate($sd_risk);
            $sd_restraint->save();
        }
    }

    protected function lockWorkUnit($data)
    {

        if ($data === "Tous"){
            return false;
        }else{
            $single_document = $this->single_document;
            $sd_work_unit = SdWorkUnit::where('name', $data)->whereHas('single_document', function ($q) use ($single_document){
                $q->where('id', $single_document->id);
            })->first();
            return $sd_work_unit;
        }

    }

    protected function lockDanger($data)
    {
        $single_document = $this->single_document;

        $danger = DB::table('dangers')
            ->where('info', 'like', substr($data, 0, 25)."%")
            ->first();
        if (!$danger) return null;

        $sd_danger = SdDanger::where('danger_id', $danger->id)->whereHas('single_document', function ($q) use ($single_document){
            $q->where('id', $single_document->id);
        })->first();
        if (!$sd_danger) return null;

        return $sd_danger;
    }

    protected function error($msg, $line)
    {
        $error = new ErrorExcel();
        $error->id = uniqid();
        $error->line = $line+1;
        $error->error = $msg;
        $error->single_document()->associate($this->single_document);
        $error->save();
    }


}
