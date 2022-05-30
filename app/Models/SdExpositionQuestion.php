<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdExpositionQuestion extends Model
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
        'intervention_type',
        'number_employee',
        'minutes',
        'value',
    ];

    public function sd_work_unit()
    {
        return $this->belongsTo(SdWorkUnit::class);
    }

    public function exposition_question()
    {
        return $this->belongsTo(ExpositionQuestion::class);
    }
}
