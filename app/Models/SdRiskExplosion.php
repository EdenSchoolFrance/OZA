<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdRiskExplosion extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = "sd_risks_explosion";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'material_explosion',
        'features',
        'material_setup',
        'source_clean',
        'degree_clean',
        'degree_ventilation',
        'availability_ventilation',
        'size_area',
        'gas',
        'dust',
        'spawn_probability',
        'prevention_probability',
        'criticity'
    ];

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class, "single_document_id");
    }

    public function sd_restraints()
    {
        return $this->hasMany(SdRestraintExplosion::class);
    }

    public function sd_restraints_porposed()
    {
        return $this->sd_restraints()->where('exist',0);
    }

    public function sd_restraints_exist()
    {
        return $this->sd_restraints()->where('exist',1);
    }

    public function sd_preventions()
    {
        return $this->hasMany(SdPreventionExplosion::class);
    }

    public function criticality(){

        $final = [];

        if ($this->criticity === "Acceptable"){
            $final['text'] = "Acceptable";
            $final['class'] = 'btn-success';
        }else if ($this->criticity === "A améliorer"){
            $final['text'] = "A améliorer";
            $final['class'] = 'btn-warning';
        }else if ($this->criticity === "Agir vite"){
            $final['text'] = "Agir vite";
            $final['class'] = 'btn-warning';
        }else if ($this->criticity === "Inacceptable"){
            $final['text'] = "Inacceptable";
            $final['class'] = 'btn-danger';
        }else {
            $final['text'] = "-";
            $final['class'] = '';
        }

        return $final;
    }
}
