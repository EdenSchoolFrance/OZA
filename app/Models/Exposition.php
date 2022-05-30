<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposition extends Model
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
        'alert'
    ];

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function exposition_groups()
    {
        return $this->hasMany(ExpositionGroup::class);
    }
    
    // public function sd_exposition_questions()
    // {
    //     return $this->hasMany(SdExpositionQuestion::class)->where('danger');
    // }
}
