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
        'protection'
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

    public function ND()
    {
        
    }
}
