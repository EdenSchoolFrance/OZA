<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychosocialQuestion extends Model
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
        'info',
        'order',
    ];

    public function restraints()
    {
        return $this->hasMany(PsychosocialQuestionRestraint::class);
    }

    public function responses()
    {
        return $this->hasMany(SdPsychosocialResponse::class);
    }

    public function response($sd_psychosocial_group_id)
    {
        return $this->responses()->where('sd_psychosocial_group_id', $sd_psychosocial_group_id)->first();
    }
}
