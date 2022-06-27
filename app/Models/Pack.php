<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
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

    public function translate()
    {
        switch ($this->name) {
            case 'compliance':
                return 'Conformité';
                break;

            case 'tranquility':
                return 'Tranquillité';
                break;

            case 'serenity':
                return 'Sérénité';
                break;
        }
    }
}
