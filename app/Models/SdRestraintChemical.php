<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdRestraintChemical extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = "sd_restraints_chemicals";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'comment',
        'date',
        'exist'
    ];

    public function sd_risk_chemical()
    {
        return $this->belongsTo(SdRiskChemical::class);
    }
}
