<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
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

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function domain_activitie()
    {
        return $this->belongsTo(DomainActivitie::class, 'domain_activity_id');
    }

    public function restraint()
    {
        return $this->hasMany(Restraint::class);
    }

    public function total(){
        $fre = $this->convert($this->frequency, 'frequency');
        $proba = $this->convert($this->probability, 'probability');
        $gra = $this->convert($this->gravity, 'gravity');

        return ($fre + $proba) * $gra;
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
}
