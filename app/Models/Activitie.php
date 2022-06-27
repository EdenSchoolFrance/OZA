<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
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
        return $this->belongsToMany(WorkUnit::class, 'work_unit_activity', 'activity_id', 'work_unit_id');
    }
}
