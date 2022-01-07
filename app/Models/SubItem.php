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

    public function sd_item()
    {
        return $this->hasMany(SdItem::class);
    }

}
