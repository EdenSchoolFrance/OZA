<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdRiskChemical extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = "sd_risks_chemicals";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'activity',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n6',
        'n7',
        'n8',
        'n9',
        'n10',
        'date',
        'ventilation',
        'concentration',
        'time',
        'protection',
        'validated'
    ];

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function sd_work_unit()
    {
        return $this->belongsTo(SdWorkUnit::class)->orderByDesc("name");
    }

    public function sd_restraints()
    {
        return $this->hasMany(SdRestraintChemical::class);
    }

    public function sd_restraints_porposed()
    {
        return $this->sd_restraints()->where('exist',0);
    }

    public function sd_restraints_exist()
    {
        return $this->sd_restraints()->where('exist',1);
    }
    public function sd_equipements()
    {
        return $this->hasMany(SdEquipementChemical::class)->orderByDesc("name");
    }

    public function T_ventilation(){
        $vent = intval($this->ventilation);

        if ($vent === 0) return "Sans ou dans un local";
        else if ($vent === 1) return "Médiocre ou travail à l'extérieur";
        else if ($vent === 2) return "Efficace";
        else if ($vent === 3) return "Aspiration localisée";
        else if ($vent === 4) return "Sorbonne de laboratoire";
        else return "NC";
    }

    public function T_concentration(){
        $con = intval($this->concentration);

        if ($con === 0) return "10 à pur";
        else if ($con === 2) return "1 à 10%";
        else if ($con === 4) return "< 1%";
        else return "NC";
    }

    public function T_time(){
        $time = intval($this->time);

        if ($time === 0) return "45mn à 8h";
        else if ($time === 2) return "5 à 45mn";
        else if ($time === 4) return "< 5mn";
        else return "NC";
    }

    public function T_protection(){
        $pro = intval($this->protection);

        if ($pro === 0) return "Aucune";
        else if ($pro === 1) return "Une seule";
        else if ($pro === 2) return "Au moins une adaptée au risque principal";
        else if ($pro === 4) return "Toutes celles nécessaires";
        else return "NC";
    }

    public function ND(){
        $translate = [
            "NC" => 0,
            "H315" => 2,
            "H317" => 2,
            "H335" => 2,
            "H362" => 2,
            "EUH066" => 2,
            "EUH203" => 2,
            "EUH204" => 2,
            "EUH205" => 2,
            "H302" => 3,
            "H312" => 3,
            "H319" => 3,
            "H332" => 3,
            "H334" => 3,
            "H336" => 3,
            "H373" => 3,
            "H301" => 4,
            "H304" => 4,
            "H311" => 4,
            "H314" => 4,
            "H318" => 4,
            "H331" => 4,
            "H372" => 4,
            "EUH029" => 4,
            "EUH031" => 4,
            "EUH070" => 4,
            "EUH071" => 4,
            "EUH206" => 4,
            "EUH207" => 4,
            "H300" => 5,
            "H310" => 5,
            "H330" => 5,
            "H370" => 5,
            "EUH032" => 5,
            "H341" => 6,
            "H351" => 6,
            "H361" => 6,
            "CMR2" => 6,
            "H340" => 6,
            "H350" => 6,
            "H360" => 6,
            "H363" => 6,
            "CMR1A" => 6,
            "CMR1B" => 6
        ];

        $final = [];

        for ($i = 0; $i < 10; $i++){
            $temp = "n" . ($i + 1);
            $final[] = [
                "key" => $this->$temp,
                "value" => $translate[$this->$temp] ?? 0
            ];
        }

        usort($final, fn($a, $b) => $a['value'] <=> $b['value']);

        return $final[count($final)-1];
    }

    public function IR(){

        return $this->ND()['value'] - $this->ventilation - $this->concentration - $this->time - $this->protection;

    }

    public function criticality(){
        $ND = $this->ND();

        $final = [];

        if ($ND === 6) {
            $final['text'] = "A améliorer";
            $final['class'] = 'btn-warning';
        }else{
            $cal = $this->IR();

            if ($cal < 0){
                $final['text'] = "Acceptable";
                $final['class'] = 'btn-success';
            }else if ($cal < 2){
                $final['text'] = "A améliorer";
                $final['class'] = 'btn-warning';
            }else if ($cal >= 2){
                $final['text'] = "Inacceptable";
                $final['class'] = 'btn-danger';
            }
        }



        return $final;
    }
}
