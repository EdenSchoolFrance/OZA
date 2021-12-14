<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        'client_number',
        'adress',
        'additional_adress',
        'city_zipcode',
        'city',
    ];

    public function expert()
    {
        return $this->belongsTo(User::class, 'expert_id');
    }

    public function single_documents()
    {
        return $this->hasMany(SingleDocument::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
