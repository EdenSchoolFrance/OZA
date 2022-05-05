<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdDanger extends Model
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
        'reflection',
        'comment',
        'ut_all',
        'validated',
        'single_document_id',
        'danger_id'
    ];

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function sd_risk()
    {
        return $this->hasMany(SdRisk::class);
    }

    public function sd_works_units()
    {
        return $this->belongsToMany(SdWorkUnit::class, 'sd_danger_sd_work_unit', 'sd_danger_id', 'sd_work_unit_id')->withPivot('exist');
    }

    public function sd_risks_ut_all()
    {
        return $this->sd_risk->where('sd_work_unit_id',null);
    }

}
