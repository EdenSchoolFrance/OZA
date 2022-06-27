<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdPsychosocialResponse extends Model
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
        'never',
        'sometimes',
        'often',
        'always',
        'intensity_level',
    ];

    public function group()
    {
        return $this->belongsTo(SdPsychosocialGroup::class);
    }

    public function question()
    {
        return $this->belongsTo(PsychosocialQuestion::class);
    }

    public function restraints()
    {
        return $this->hasMany(SdPsychosocialResponseRestraint::class);
    }
}
