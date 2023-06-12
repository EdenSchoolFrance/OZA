<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleDocument extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_entreprise',
        'adress',
        'additional_adress',
        'city_zipcode',
        'city',
        'sector',
        'activity_description',
        'premise_description',
        'firstname',
        'lastname',
        'email',
        'phone',
        'function',
        'work_unit_limit',
        'risk_psycho',
        'risk_chemical',
        'risk_explosion',
        'archived',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'sd_user', 'single_document_id', 'user_id');
    }

    public function manager()
    {
        return $this->belongsToMany(User::class, 'sd_user', 'single_document_id', 'user_id')->whereHas('role', function ($q) {
            $q->where('permission', 'MANAGER');
        });
    }

    public function dangers()
    {
        return $this->hasMany(SdDanger::class);
    }

    public function work_unit()
    {
        return $this->hasMany(SdWorkUnit::class)->orderByDesc("name");
    }

    public function work_unit_pdf()
    {
        return $this->hasMany(SdWorkUnit::class)->orderByDesc("name");
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function histories()
    {
        return $this->hasMany(Historie::class);
    }


    public function errors_excel()
    {
        return $this->hasMany(ErrorExcel::class);
    }

    public function psychosocial_groups()
    {
        return $this->hasMany(SdPsychosocialGroup::class);
    }

    public function moyenneRB()
    {
        $total = 0;
        $count = 0;
        foreach ($this->dangers as $sd_danger){
            if($sd_danger->exist === 1){
                foreach ($sd_danger->sd_risk_exist_optimized() as $sd_risk){
                    $total = $total+$sd_risk->total();
                    $count++;
                }
            }
        }
        if ($count === 0) return "-";
        //else return $count;
        else return round($total / $count, 1);
    }

    public function color($number,$RB){
        if ($RB === true){
            if ($number === "-") return "";
            switch (true) {
                case ($number < 24) :
                    return '';
                case ($number <= 50) :
                    return 'text-color-pink';
            }
        }else{
            if ($number === "-") return "text-color-green";
            switch (true) {
                case ($number < 12.5) :
                    return 'text-color-green';
                case ($number < 20) :
                    return 'text-color-orange';
                case ($number < 30) :
                    return 'text-color-pink';
                case ($number <= 50) :
                    return 'text-color-red';
            }
        }

    }

    public function moyenneRR()
    {
        $total = 0;
        $count = 0;
        foreach ($this->dangers as $sd_danger){
            if($sd_danger->exist === 1){
                foreach ($sd_danger->sd_risk_exist_optimized() as $sd_risk){

                    $RR = $sd_risk->totalRR($sd_risk->sd_restraints->where('exist', 1));

                    if ($RR === 0)
                    $RR = $sd_risk->total();

                    $total = $total+$RR;
                    $count++;
                }
            }
        }

        if ($count === 0) return "-";
        else return round($total / $count, 1);
    }

    public function discountRisk($moyenneRB = null, $moyenneRR = null) {

        $RB = $moyenneRB ?? $this->moyenneRB();
        $RR = $moyenneRR ?? $this->moyenneRR();

        if ($RB !== "-" && $RB !== 0 && $RR) {
            return round(($RB - $RR) / $RB * 100, 1);
        } else {
            return "-";
        }
    }


    public function graphique(){
        $tab = [0, 0, 0, 0];
        foreach ($this->dangers as $sd_danger){
            if($sd_danger->exist === 1){
                foreach ($sd_danger->sd_risk as $sd_risk){
                    $existSDRestraint = $sd_risk->sd_restraints->where('exist', 1);
                    $sdRiskTotalRR = count($existSDRestraint)
                        ? $sd_risk->totalRR($existSDRestraint)
                        : $sd_risk->total();

                    if ($sdRiskTotalRR < 12.5) {
                        $tab[0] += 1;
                    } elseif ($sdRiskTotalRR < 20) {
                        $tab[1] += 1;
                    } elseif ($sdRiskTotalRR < 30) {
                        $tab[2] += 1;
                    } elseif ($sdRiskTotalRR <= 50) {
                        $tab[3] += 1;
                    }

                }
            }
        }
        return $tab;
    }

    public function temp(){
        $tab = [];
        foreach ($this->dangers as $sd_danger){
            if($sd_danger->exist === 1){
                foreach ($sd_danger->sd_risk_exist_optimized() as $sd_risk){
                    $tab[] = $sd_risk;
                }
            }
        }
        return $tab;
    }

    public function scopeOnlyArchived($query)
    {
        return $query->where('archived', 1);
    }

    public function scopeOnlyUnArchived($query)
    {
        return $query->where('archived', 0);
    }

    public function scopeFilterByName($query, $name = null)
    {
        return $query->when($name, fn ($q) => $q->where('name', 'LIKE', '%' . $name . '%'));
    }

    public function scopeFilterByStatus($query, $status = null)
    {
        return $query->when($status, fn ($q) => $status === 'in_progress' ? $q->onlyUnArchived() : $q->onlyArchived());
    }
}
