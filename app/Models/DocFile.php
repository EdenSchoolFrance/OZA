<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocFile extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    public $table = "docs_files";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date'
    ];

    public function doc()
    {
        return $this->belongsTo(Doc::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
