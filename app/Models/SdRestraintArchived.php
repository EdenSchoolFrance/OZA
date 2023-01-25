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
        'rr',
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

    public function colorPDF(){
        $number = $this->rr;

        switch (true) {
            case ($number < 12.5) :
                return 'green';
            case ($number < 20) :
                return 'yellow';
            case ($number < 30) :
                return 'pink';
            case ($number <= 50) :
                return 'red';
        }

    }

    public function colorTotal(){
        $number = $this->rr;
        switch (true) {
            case ($number < 12.5) :
                return 'Acceptable';
            case ($number < 20) :
                return 'A améliorer';
            case ($number < 30):
                return 'Agir vite';
            case ($number <= 50):
                return 'STOP';
        }
    }
}
