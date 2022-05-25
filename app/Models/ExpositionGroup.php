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
}
