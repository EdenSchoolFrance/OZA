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
        'connected',
        'first_connection'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    // TODO: User should have many roles , or if you are using role/permission, it should be another implementation set
    // All code related to this relation it will have a temporary implementation
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

        $roles = resolve('AppCacheService')->getRoles();

        if ($role) {
            return $roles->whereIn('permission', is_array($role)  ? $role : [$role])->count() > 0;
        }

        return true;
    }

    public function hasPermission($role = null)
    {
        $roles = resolve('AppCacheService')->getRoles();

        return $roles->whereIn('permission', is_array($role)  ? $role : [$role])->count() > 0;
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
