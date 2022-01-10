<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdActivitie extends Model
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
        'text'
    ];

    public function work_unit()
    {
        return $this->belongsTo(SdActivitie::class, 'sd_work_unit_id');
    }

}
