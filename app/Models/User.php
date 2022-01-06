<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'post',
        'phone',
        'username',
        'password',
        'oza',
        'connected'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasAccess($user_type, $role = null)
    {
        if ($user_type == "oza" && !$this->oza) {
            return false;
        } elseif ($user_type == "client" && $this->oza) {
            return false;
        }

        if ($role) {
            if (gettype($role) == 'array') {
                foreach ($role as $value) {
                    if ($this->role()->where('permission', $value)->first()) {
                        return true;
                    }
                }
    
                return false;
            } else {
                return null !== $this->role()->where('permission', $role)->first();
            }
        }

        return true;
    }

    public function hasPermission($role = null)
    {
        if (gettype($role) == 'array') {
            foreach ($role as $value) {
                if ($this->role()->where('permission', $value)->first()) {
                    return true;
                }
            }

            return false;
        } else {
            return null !== $this->role()->where('permission', $role)->first();
        }
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function single_documents()
    {
        return $this->belongsToMany(SingleDocument::class, 'sd_user', 'user_id', 'single_document_id');
    }



    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
