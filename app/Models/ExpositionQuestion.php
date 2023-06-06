<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpositionQuestion extends Model
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
        'intensity',
        'options'
    ];

    public function exposition_group()
    {
        return $this->belongsTo(ExpositionGroup::class);
    }

    public function sd_exposition_questions()
    {
        return $this->hasMany(SdExpositionQuestion::class);
    }

    public function sd_work_unit_exposition_question($id)
    {
        return $this->sd_exposition_questions->where('exposition_question_id', $this->id)->where('sd_work_unit_id', $id)->first();
    }

    public function sd_work_unit_expositions_questions($id)
    {
        return $this->sd_exposition_questions()->where('exposition_question_id', $this->id)->where('sd_work_unit_id', $id)->get();
    }
}
