<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdPsychosocialGroup extends Model
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
        'number_quiz',
        'stress_level',
        'employee',
        'validated',
    ];

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function responses()
    {
        return $this->hasMany(SdPsychosocialResponse::class);
    }
}
