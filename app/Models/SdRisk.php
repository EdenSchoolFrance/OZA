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
        return $this->belongsTo(SdWorkUnit::class)->orderByDesc("name");
    }

    public function sd_restraints()
    {
        return $this->hasMany(SdRestraint::class);
    }

    public function sd_restraints_porposed()
    {
        return $this->sd_restraints()->where('exist',0);
    }
    public function sd_restraints_exist()
    {
        return $this->sd_restraints()->where('exist',1);
    }

    public function sd_restraints_archived()
    {
        return $this->sd_restraints()->where('exist',1)->whereNotNull('date');
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
                        return 'An';
                    case 'year+' :
                        return '< An';
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

    public function total(){
        $fre = $this->convert($this->frequency, 'frequency');
        $proba = $this->convert($this->probability, 'probability');
        $gra = $this->convert($this->gravity, 'gravity');

        return ($fre + $proba) * $gra;
    }

    public function totalRR($restraints){
        $RB = $this->total();
        $totalEnd = 0;
        $count = 0;
        foreach ($restraints as $restraint){
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
                    $orga = 3;
                    break;
                case 'good' :
                    $orga = 2;
                    break;
                case 'medium' :
                    $orga = 1;
                    break;
                case 'null' :
                    $orga = 0;
                    break;
            }

            switch ($restraint->human) {
                case 'very good' :
                    $human = 3;
                    break;
                case 'good' :
                    $human = 2;
                    break;
                case 'medium' :
                    $human = 1;
                    break;
                case 'null' :
                    $human = 0;
                    break;
            }
            $total = $tech + $orga + $human;

            $totalEnd = $total+$totalEnd;

            $count++;
        }
        if ($count === 0) return 0;

        $A = $totalEnd + 1/10 * $count;

        if ($A >= 18.6) $Pon = RiskCalculation::where('sum', 18.6)->first();
        else if ($A <= 1.0) $Pon = RiskCalculation::where('sum', 1.0)->first();
        else $Pon = RiskCalculation::where('sum', $A)->first();


        $cal = $Pon->weighting * $RB;

        return round($cal, 1);
    }

    public function color($number, $RB){
        if ($RB === true){
            switch (true) {
                case ($number <= 12.5) :
                case ($number <= 20) :
                    return '';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }else{
            switch (true) {
                case ($number <= 12.5) :
                case ($number <= 20) :
                    return '';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }

    }

    public function colorPost($number, $RB){
        if ($RB === true){
            switch (true) {
                case ($number <= 12.5) :
                case ($number <= 24) :
                    return '';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }else{
            switch (true) {
                case ($number <= 12.5) :
                case ($number <= 24) :
                    return '';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }

    }

    public function colorC($number, $RB){
        if ($RB === true){
            switch (true) {
                case ($number <= 12.5) :
                    return 'btn-success';
                case ($number <= 20) :
                    return 'btn-yellow';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }else{
            switch (true) {
                case ($number <= 12.5) :
                    return 'btn-success';
                case ($number <= 20) :
                    return 'btn-yellow';
                case ($number <= 30) :
                    return 'btn-warn';
                case ($number >= 30) :
                    return 'btn-danger';
            }
        }

    }

    public function colorPDF($number, $RB){
        if ($RB === true){
            switch (true) {
                case ($number <= 12.5) :
                    return 'green';
                case ($number <= 20) :
                    return 'yellow';
                case ($number <= 30) :
                    return 'pink';
                case ($number >= 30) :
                    return 'red';
            }
        }else{
            switch (true) {
                case ($number <= 12.5) :
                    return 'green';
                case ($number <= 20) :
                    return 'yellow';
                case ($number <= 30) :
                    return 'pink';
                case ($number >= 30) :
                    return 'red';
            }
        }

    }

    public function colorTotal($number, $RB){
        if ($RB === true){
            switch (true) {
                case ($number <= 12.5) :
                    return 'Acceptable';
                case ($number <= 20) :
                    return 'A améliorer';
                case ($number <= 30):
                    return 'Agir vite';
                case ($number >= 30) :
                    return 'STOP';
            }
        }else {
            switch (true) {
                case ($number <= 12.5) :
                    return 'Acceptable';
                case ($number <= 20) :
                    return 'A améliorer';
                case ($number <= 30):
                    return 'Agir vite';
                case ($number >= 30) :
                    return 'STOP';
            }
        }
    }

    public function moyenneTech(){
        $total = 0;
        $count = 0;
        foreach ($this->sd_restraints_exist as $sd_restraint){
            $total = $total+$sd_restraint->convert($sd_restraint->technical, 'technical');
            $count++;
        }
        if ($count === 0) return '-';
        return ceil($total / $count);
    }

    public function moyenneOrga(){
        $total = 0;
        $count = 0;
        foreach ($this->sd_restraints_exist as $sd_restraint){
            $total = $total+$sd_restraint->convert($sd_restraint->organizational, 'organizational');
            $count++;
        }
        if ($count === 0) return '-';
        return ceil($total / $count);
    }

    public function moyenneHum(){
        $total = 0;
        $count = 0;
        foreach ($this->sd_restraints_exist as $sd_restraint){
            $total = $total+$sd_restraint->convert($sd_restraint->human, 'human');
            $count++;
        }
        if ($count === 0) return '-';
        return ceil($total / $count);
    }

    public function translateRR($number, $type){

        switch (true){
            case ($type === "tech"):
                switch (true){
                    case ($number == 4) :
                        return "très bon";
                    case ($number == 3):
                        return "bon";
                    case ($number == 2):
                        return "moy";
                    case ($number == 0):
                        return "0";
                }
                break;
            case ($type === "orga"):
            case ($type === "hum"):
                switch (true){
                    case ($number == 3) :
                        return "très bon";
                    case ($number == 2):
                        return "bon";
                    case ($number == 1):
                        return "moy";
                    case ($number == 0):
                        return "0";
                }
                break;

            default:
                return "0";

        }
    }

}
