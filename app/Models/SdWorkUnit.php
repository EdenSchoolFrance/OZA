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

    public function activities()
    {
        return $this->hasMany(SdActivitie::class, 'sd_work_unit_id');
    }

    public function items()
    {
        return $this->hasMany(SdItem::class, 'sd_work_unit_id');
    }

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function sd_dangers()
    {
        return $this->belongsToMany(SdDanger::class, 'sd_danger_sd_work_unit', 'sd_work_unit_id', 'sd_danger_id')->withPivot('exist');
    }

    public function sd_danger($id)
    {
        return $this->sd_dangers->where('id', $id)->first();
    }

    public function sd_risks()
    {
        return $this->hasMany(SdRisk::class);
    }

    public function sd_danger_risks($id)
    {
        /*return $this->sd_risks->whereHas('sd_danger', function ($q) use ($id){
            $q->where('id', $id);
        })->get();*/
        return $this->sd_risks->where('sd_danger_id', $id);
    }
}
