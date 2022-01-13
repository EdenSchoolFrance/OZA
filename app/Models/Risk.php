<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
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
        'frequency',
        'probability',
        'gravity',
        'impact'
    ];

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function domain_activitie()
    {
        return $this->belongsTo(DomainActivitie::class, 'domain_activity_id');
    }

    public function restraint()
    {
        return $this->hasMany(Restraint::class);
    }
}
