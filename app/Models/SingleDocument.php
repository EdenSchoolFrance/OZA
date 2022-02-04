<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleDocument extends Model
{
    use HasFactory;

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
        'sector',
        'activity_description',
        'premise_description',
        'firstname',
        'lastname',
        'email',
        'phone',
        'archived',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'sd_user', 'single_document_id', 'user_id');
    }

    public function manager()
    {
        return $this->belongsToMany(User::class, 'sd_user', 'single_document_id', 'user_id')->whereHas('role', function ($q) {
            $q->where('permission', 'MANAGER');
        });
    }

    public function dangers()
    {
        return $this->hasMany(SdDanger::class);
    }

    public function work_unit()
    {
        return $this->hasMany(SdWorkUnit::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
