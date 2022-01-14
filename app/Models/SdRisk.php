<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdRisk extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'frequency',
        'probability',
        'gravity',
        'impact'
    ];

    public function sd_danger()
    {
        return $this->belongsTo(SdDanger::class, 'sd_danger_id');
    }

    public function sd_work_unit()
    {
        return $this->belongsTo(SdWorkUnit::class);
    }

    public function sd_restraint()
    {
        return $this->hasMany(SdRestraint::class);
    }

    public function translate($name,$setting){
        switch ($setting){
            case 'frequency' :
                switch ($name){
                    case 'day' :
                        return 'Jour';
                    case 'week' :
                        return 'Semaine';
                    case 'month' :
                        return 'Mois';
                    case 'year' :
                        return 'Année';
                    case 'year+' :
                        return '> Année';
                }
            break;
            case 'probability' :
                switch ($name){
                    case 'very high' :
                        return 'Très élevée';
                    case 'high' :
                        return 'Élevée';
                    case 'medium' :
                        return 'Non faible';
                    case 'weak' :
                        return 'Faible';
                    case 'very weak' :
                        return 'Très faible';
                }
            break;
            case 'gravity' :
                switch ($name){
                    case 'death' :
                        return 'Décès';
                    case 'ipp' :
                        return "IPP";
                    case 'aaa' :
                        return 'AAA';
                    case 'asa' :
                        return 'ASA';
                    case 'weak impact' :
                        return 'Impact faible';
                }
            break;
            case 'impact' :
                switch ($name) {
                    case 'null' :
                        return 'Non';
                    case 'male' :
                        return "Homme";
                    case 'female' :
                        return 'Femme';
                }
            break;
        }
    }

    public function convert($name,$setting){

        switch ($setting){
            case 'frequency' :
                switch ($name){
                    case 'day' :
                        return 5;
                    case 'week' :
                        return 4;
                    case 'month' :
                        return 3;
                    case 'year' :
                        return 2;
                    case 'year+' :
                        return 1;
                }
            break;
            case 'probability' :
                switch ($name){
                    case 'very high' :
                        return 5;
                    case 'high' :
                        return 4;
                    case 'medium' :
                        return 3;
                    case 'weak' :
                        return 2;
                    case 'very weak' :
                        return 0.5;
                }
            break;
            case 'gravity' :
                switch ($name){
                    case 'death' :
                        return 5;
                    case 'ipp' :
                        return 4;
                    case 'aaa' :
                        return 3;
                    case 'asa' :
                        return 2;
                    case 'weak impact' :
                        return 1;
                }
            break;
        }
    }

    public function total($frequency, $probability, $gravity){

        $fre = $this->convert($frequency,'frequency');
        $proba = $this->convert($probability, 'probability');
        $gra = $this->convert($gravity,'gravity');

        return ($fre + $proba) * $gra;
    }

    public function totalRR($restraints){
        $totalEnd = 0;
        foreach ($restraints as $restraint){
            if($restraint->exist === 1){
                $tech = 0;
                $orga = 0;
                $human = 0;

                switch ($restraint->technical) {
                    case 'very good' :
                        $tech = 4;
                        break;
                    case 'good' :
                        $tech = 3;
                        break;
                    case 'medium' :
                        $tech = 2;
                        break;
                    case 'null' :
                        $tech = 0;
                        break;
                }

                switch ($restraint->organizational) {
                    case 'very good' :
                        $tech = 3;
                        break;
                    case 'good' :
                        $tech = 2;
                        break;
                    case 'medium' :
                        $tech = 1;
                        break;
                    case 'null' :
                        $tech = 0;
                        break;
                }

                switch ($restraint->human) {
                    case 'very good' :
                        $tech = 3;
                        break;
                    case 'good' :
                        $tech = 2;
                        break;
                    case 'medium' :
                        $tech = 1;
                        break;
                    case 'null' :
                        $tech = 0;
                        break;
                }
                $total = $tech + $orga + $human;
                $result = 0;
                switch ($total) {
                    case 10 :
                        $result= $total * 0.2;
                        break;
                    case 9 :
                        $result= $total * 0.25;
                        break;
                    case 8 :
                        $result= $total * 0.3;
                        break;
                    case 7 :
                        $result= $total * 0.35;
                        break;
                    case 6 :
                        $result= $total * 0.4;
                        break;
                    case 5 :
                        $result= $total * 0.5;
                        break;
                    case 4 :
                        $result= $total * 0.6;
                        break;
                    case 3 :
                        $result= $total * 0.7;
                        break;
                    case 2 :
                        $result= $total * 0.8;
                        break;
                    case 1 :
                        $result= $total * 0.9;
                        break;
                }
                $totalEnd = $totalEnd+$result;
            }
        }
        return $totalEnd;
    }

    public function color($number){
        switch (true) {
            case ($number <= 15) :
                return 'btn-success';
            case ($number < 20) :
            case ($number < 30):
                return 'btn-warning';
            case ($number >= 30) :
                return 'btn-danger';
        }
    }

    public function colorTotal($number){
        switch (true) {
            case ($number <= 15) :
                return 'Acceptable';
            case ($number < 20) :
                return 'A améliorer';
            case ($number < 30):
                return 'Agir vite';
            case ($number >= 30) :
                return 'STOP';
        }
    }

}
