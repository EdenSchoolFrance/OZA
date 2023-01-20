<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdRestraintArchived extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = "sd_restraints_archived";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date',
        'technical',
        'organizational',
        'human',
        'exist',
        'sd_work_unit_name',
        'danger_name'
    ];

    public function sd_risk()
    {
        return $this->belongsTo(SdRisk::class);
    }

    public function single_document()
    {
        return $this->belongsTo(SingleDocument::class);
    }

    public function convert($name,$setting){
        switch ($setting) {
            case 'technical' :
                switch ($name) {
                    case 'very good' :
                        return 4;
                    case 'good' :
                        return 3;
                    case 'medium' :
                        return 2;
                    case 'null' :
                        return 0;
                }
                break;
            case 'organizational' :
                switch ($name) {
                    case 'very good' :
                        return 3;
                    case 'good' :
                        return 2;
                    case 'medium' :
                        return 1;
                    case 'null' :
                        return 0;
                }
                break;
            case 'human' :
                switch ($name) {
                    case 'very good' :
                        return 3;
                    case 'good' :
                        return 2;
                    case 'medium' :
                        return 1;
                    case 'null' :
                        return 0;
                }
        }
    }
}
