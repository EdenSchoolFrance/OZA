<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdPsychosocialResponseRestraint extends Model
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
        'text',
    ];

    public function response()
    {
        return $this->belongsTo(SdPsychosocialResponse::class);
    }

    public function question()
    {
        return $this->belongsTo(PsychosocialQuestion::class);
    }
}
