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
        'prevention_probability'
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
}
