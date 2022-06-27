<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubItem extends Model
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

    public function child_sub_items()
    {
        return $this->hasMany(ChildSubItem::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }

    public function sd_items()
    {
        return $this->hasMany(SdItem::class);
    }

    public function sd_work_unit_sd_items($sd_work_unit_id)
    {
        return $this->sd_items()->whereHas('sd_work_unit', function ($q) use ($sd_work_unit_id) {
            $q->where('id', $sd_work_unit_id);
        })->get();
    }
}
