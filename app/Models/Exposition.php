<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposition extends Model
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
        'info',
        'alert'
    ];

    public function danger()
    {
        return $this->belongsTo(Danger::class);
    }

    public function exposition_groups()
    {
        return $this->hasMany(ExpositionGroup::class);
    }

    // public function sd_exposition_questions()
    // {
    //     return $this->hasMany(SdExpositionQuestion::class)->where('danger');
    // }

    public function pivot($id)
    {
        $sd_danger = SdDanger::whereHas('single_document', function ($q) use ($id) {
            $q->where('id', $id);
        })->where('danger_id', $this->danger_id )->first();

        if (!isset($sd_danger)) return $result = [];
        $result = [];

        foreach ($sd_danger->sd_works_units as $sd_work_unit){
            if ($sd_work_unit->sd_danger($sd_danger->id)->pivot->exposition === 1) $result[] = $sd_work_unit->sd_danger($sd_danger->id)->pivot->exposition;
        }

        return $result;
    }

    public function HisExpose(SingleDocument $single_document){

        foreach ($single_document->dangers->whereNotNull('danger.exposition') as $danger){
            foreach ($danger->sd_works_units->whereNotNull('sd_expositions_questions') as $sd_work_unit){
                foreach ($this->exposition_groups as $key => $exposition_group){
                    foreach ($exposition_group->exposition_questions as $key => $exposition_question){
                        $sd_expo_question = $exposition_question->sd_work_unit_exposition_question($sd_work_unit->id);
                        $sd_expos_questions = $exposition_question->sd_work_unit_expositions_questionsById($sd_work_unit->id);
                        if (count($sd_expos_questions) > 0){
                            return "Oui";
                            break;
                        }
                    }
                }
            }
        }

        return "Non";

    }
}
