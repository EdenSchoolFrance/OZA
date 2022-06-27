<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historie extends Model
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
        'work',
        'date'
    ];

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
