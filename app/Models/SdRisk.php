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
}
