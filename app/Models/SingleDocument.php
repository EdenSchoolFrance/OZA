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
        return $this->hasMany(SdWorkUnit::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function moyenneRB()
    {
        $total = 0;
        $count = 0;
        foreach ($this->dangers as $sd_danger){
            foreach ($sd_danger->sd_risk as $sd_risk){
                $total = $total+$sd_risk->total();
                $count++;
            }
        }
        return $total / $count;
    }

    public function color($number){
        switch (true) {
            case ($number <= 15) :
                return 'text-color-green';
            case ($number < 20) :
            case ($number < 30) :
                return 'text-color-orange';
            case ($number >= 30) :
                return 'text-color-red';
        }
    }

    public function moyenneRR()
    {
        $end = 0;
        $count = 0;
        foreach ($this->dangers as $sd_danger){
            foreach ($sd_danger->sd_risk as $sd_risk){
                foreach ($sd_risk->sd_restraints_exist as $sd_restraint){
                    $tech = 0;
                    $orga = 0;
                    $human = 0;

                    switch ($sd_restraint->technical) {
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

                    switch ($sd_restraint->organizational) {
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

                    switch ($sd_restraint->human) {
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
                    $result = 0;
                    switch ($total) {
                        case 10 :
                            $result= 0.2;
                            break;
                        case 9 :
                            $result= 0.25;
                            break;
                        case 8 :
                            $result= 0.3;
                            break;
                        case 7 :
                            $result= 0.35;
                            break;
                        case 6 :
                            $result= 0.4;
                            break;
                        case 5 :
                            $result= 0.5;
                            break;
                        case 4 :
                            $result= 0.6;
                            break;
                        case 3 :
                            $result= 0.7;
                            break;
                        case 2 :
                            $result= 0.8;
                            break;
                        case 1 :
                            $result= 0.9;
                            break;
                    }
                    $end = $end+$total;
                    $count++;
                }
            }
        }
        return $end / $count;
    }


    public function graphique(){

        $tab = [0,0,0,0];
        foreach ($this->dangers as $sd_danger){
            foreach ($sd_danger->sd_risk as $sd_risk){
                foreach ($sd_risk->sd_restraints_exist as $sd_restraint){
                    $tech = 0;
                    $orga = 0;
                    $human = 0;

                    switch ($sd_restraint->technical) {
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

                    switch ($sd_restraint->organizational) {
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

                    switch ($sd_restraint->human) {
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

                    switch (true) {
                        case ($total >= 9) :
                            $tab[0] = $tab[0]+1;
                            break;
                        case ($total > 6) :
                            $tab[1] = $tab[1]+1;
                            break;
                        case ($total > 3) :
                            $tab[2] = $tab[2]+1;
                            break;
                        case ($total <= 0) :
                            $tab[3] = $tab[3]+1;
                            break;
                    }

                }
            }
        }
        return $tab;
    }
}
