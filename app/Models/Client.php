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
        'image',
        'adress',
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
    public function scopeOnlyArchived($query)
    {
        return $query->where('archived', 1);
    }

    public function scopeOnlyUnArchived($query)
    {
        return $query->where('archived', 0);
    }

    public function scopeFilterByName($query, $name = null)
    {
        return $query->when($name, fn ($q) => $q->where('name', 'LIKE', '%' . $name . '%'));
    }

    public function scopeFilterByStatus($query, $status = null)
    {
        return $query->when($status, fn ($q) => $status === 'in_progress' ? $q->onlyUnArchived() : $q->onlyArchived());
    }
}
