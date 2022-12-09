<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdPsychosocialResponse extends Model
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
        'never',
        'sometimes',
        'often',
        'always',
        'intensity_level',
    ];

    public function group()
    {
        return $this->belongsTo(SdPsychosocialGroup::class, 'sd_psychosocial_group_id');
    }

    public function question()
    {
        return $this->belongsTo(PsychosocialQuestion::class, 'psychosocial_question_id');
    }

    public function restraints()
    {
        return $this->hasMany(SdPsychosocialResponseRestraint::class);
    }

    public function intensity(){
        $question = $this->question;
        $number_quiz = $this->group->number_quiz;

        if ($question->order < 13) {
            $intensity = ($this->sometimes * 3.3333) + ($this->often * 6.6666) + ($this->always * 10);
        } else {
            $intensity = ($this->never * 10) + ($this->sometimes * 6.6666) + ($this->often * 3.3333);
        }

        if ($number_quiz > 0) $intensity = ($intensity / $number_quiz);

        return number_format($intensity, 1);
    }

    public function priority(){

        $question = $this->question;

        $intensity = $this->intensity();

        $priority = [
            "class" => "btn-success",
            "text" => "Non concerné"
        ];

        if ($intensity < 2.5) {
            $priority = [
                "class" => "btn-success",
                "text" => "Non concerné"
            ];
        } elseif ($intensity >= 2.5 && $intensity < 5) {
            $priority = [
                "class" => "btn-yellow",
                "text" => "Faible"
            ];
        } elseif ($intensity >= 5 && $intensity < 7.5) {
            $priority = [
                "class" => "btn-warning",
                "text" => "Modéré"
            ];
        } elseif ($intensity >= 7.5) {
            $priority = [
                "class" => "btn-danger",
                "text" => "Elevé"
            ];
        }

        return $priority;
    }

    public function priorityPDF(){

        $question = $this->question;

        $intensity = $this->intensity();

        $priority = [
            "class" => "green",
            "text" => "Non concerné"
        ];

        if ($intensity < 2.5) {
            $priority = [
                "class" => "green",
                "text" => "Non concerné"
            ];
        } elseif ($intensity >= 2.5 && $intensity < 5) {
            $priority = [
                "class" => "yellow",
                "text" => "Faible"
            ];
        } elseif ($intensity >= 5 && $intensity < 7.5) {
            $priority = [
                "class" => "pink",
                "text" => "Modéré"
            ];
        } elseif ($intensity >= 7.5) {
            $priority = [
                "class" => "red",
                "text" => "Elevé"
            ];
        }

        return $priority;
    }

    public function extreme(){

        $question = $this->question;

        if ($question->order <= 13) {
            $extreme = $this->always;
        } else {
            $extreme = $this->never;
        }

        return $extreme;
    }
}
