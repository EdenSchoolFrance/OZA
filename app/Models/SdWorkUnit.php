<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdWorkUnit extends Model
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
        'number_employee',
        'validated'
    ];

    public function activitie()
    {
        return $this->hasMany(SdActivitie::class, 'sd_work_unit_id');
    }

    public function item()
    {
        return $this->hasMany(SdItem::class, 'sd_work_unit_id');
    }

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }
}
