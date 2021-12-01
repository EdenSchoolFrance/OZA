<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Single_documents extends Model
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
        'name_entreprise',
        'adress',
        'additional_adress',
        'city_zipcode',
        'city',
        'description',
        'firstname',
        'lastname',
        'email',
        'phone'
    ];
}
