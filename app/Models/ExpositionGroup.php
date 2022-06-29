<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpositionGroup extends Model
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
        'calculation',
        'intervention_type_label',
        'value_label',
        'duration',
        'type',
    ];

    public function exposition()
    {
        return $this->belongsTo(Exposition::class);
    }

    public function exposition_questions()
    {
        return $this->hasMany(ExpositionQuestion::class);
    }

    public function calculation($value)
    {
        $tab = unserialize($this->calculation);

        for ($i=0; $i < count($tab); $i++) { 
            
            if (eval('return '.$value . $tab["green"].';')){
                return "green";
            }else if (eval('return '.$value . $tab["red"].';')){
                return "red";
            }else if (eval('return '.$value . $tab["orange"].';')){
                return "orange";
            }
        }
    }

    public function translate($value)
    {
        $tab = unserialize($this->calculation);

        for ($i=0; $i < count($tab); $i++) { 
            
            if (eval('return '.$value . $tab["green"].';')){
                return "Acceptable";
            }else if (eval('return '.$value . $tab["red"].';')){
                return "Exposé";
            }else if (eval('return '.$value . $tab["orange"].';')){
                return "A améliorer";
            }
        }
    }
}
