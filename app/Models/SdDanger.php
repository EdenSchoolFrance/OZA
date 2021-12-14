<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdDanger extends Model
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
        'reflection',
        'comment',
        'ut_all',
        'validated',
        'single_document_id',
        'danger_id'
    ];

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }
}
