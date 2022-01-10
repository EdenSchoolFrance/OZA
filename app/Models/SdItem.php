<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdItem extends Model
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

    public function sub_item()
    {
        return $this->belongsTo(SubItem::class, 'sub_item_id');
    }

    public function sd_work_unit()
    {
        return $this->belongsTo(SdWorkUnit::class, 'sd_work_unit_id');
    }
}
