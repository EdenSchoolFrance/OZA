<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model
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
        'name'
    ];

    public function activitie()
    {
        return $this->belongsToMany(Activitie::class, 'work_unit_activity', 'work_unit_id', 'activity_id');
    }

    public function sector_activitie()
    {
        return $this->belongsTo(SectorActivitie::class, 'sector_activity_id');
    }
}
