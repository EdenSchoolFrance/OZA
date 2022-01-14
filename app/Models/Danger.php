<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danger extends Model
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
        'info'
    ];

    public function packs()
    {
        return $this->belongsToMany(Pack::class, 'danger_pack');
    }

    public function risks()
    {
        return $this->hasMany(Risk::class,'danger_id');
    }

    public function reflections()
    {
        return $this->hasMany(Reflection::class, 'danger_id');
    }
}
