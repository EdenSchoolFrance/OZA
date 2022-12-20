<?php

namespace Database\Seeders;

use App\Models\Exposition;
use App\Models\ExpositionGroup;
use Illuminate\Database\Seeder;

class ExpositionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expositionGroups = [
            "exposition_activity" => [
                [
                    "name" => "exposition_group_intervention",
                    "calculation" => [
                        "green" => "<= 47",
                        "orange" => ">= 48",
                        "red" => ">= 60",
                    ],
                    "intervention_type_label" => "Type d’intervention ou de travaux \n dépassant le seuil règlementaire",
                    "value_label" => "Nombre d’interventions \n ou travaux/an",
                    "duration" => "< 60 / an",
                    "type" => "default",
                ],
            ],
            "exposition_temperature" => [
                [
                    "name" => "exposition_group_thermal_environment",
                    "calculation" => [
                        "green" => "<= 719",
                        "orange" => ">= 720",
                        "red" => ">= 900",
                    ],
                    "intervention_type_label" => "Ambiance thermique de travail \n (hors températures extérieures) :",
                    "value_label" => null,
                    "duration" => "< 900 h / an",
                    "type" => "duration",
                ],
            ],
            "exposition_noise" => [
                [
                    "name" => "exposition_group_noise_level",
                    "calculation" => [
                        "green" => "<= 479",
                        "orange" => ">= 480",
                        "red" => ">= 600",
                    ],
                    "intervention_type_label" => "Niveau d’exposition au bruit rapporté à une \n période de référence de huit heures",
                    "value_label" => null,
                    "duration" => "> 600 h / an",
                    "type" => "duration",
                ],
                [
                    "name" => "exposition_group_sound_pressure_level",
                    "calculation" => [
                        "green" => "<= 95",
                        "orange" => ">= 96",
                        "red" => ">= 120",
                    ],
                    "intervention_type_label" => "Exposition à un niveau \n de pression acoustique de crête",
                    "value_label" => "Nombre \n d’exposition / an",
                    "duration" => "> 120 fois / an",
                    "type" => "default",
                ],
            ],
            "exposition_night_work" => [
                [
                    "name" => "exposition_group_night_work",
                    "calculation" => [
                        "green" => "<= 95",
                        "orange" => ">= 96",
                        "red" => ">= 120",
                    ],
                    "intervention_type_label" => "Contexte pour lequel une heure de travail a lieu entre 24 heures et 5 heures \n (hors nuits effectuées dans le cadre d’équipes successives alternantes)",
                    "value_label" => "Nombre \n de nuit / an",
                    "duration" => "> 120 fois / an",
                    "type" => "default",
                ],
                [
                    "name" => "exposition_group_team_work",
                    "calculation" => [
                        "green" => "<= 39",
                        "orange" => ">= 40",
                        "red" => ">= 50",
                    ],
                    "intervention_type_label" => "Contexte pour lequel le travail en équipes successives alternantes impliquant au \n minimum une heure de travail entre 24 heures et 5 heures",
                    "value_label" => "Nombre \n de nuit / an",
                    "duration" => "> 50 fois / an",
                    "type" => "default",
                ],
            ],
            "exposition_repetitive_work" => [
                [
                    "name" => "exposition_group_repetitive_work",
                    "calculation" => [
                        "green" => "<= 719",
                        "orange" => ">= 720",
                        "red" => ">= 900",
                    ],
                    "intervention_type_label" => "Contexte pour lequel le temps de cycle est spécifique",
                    "value_label" => null,
                    "duration" => "< 900 h / an",
                    "type" => "duration",
                ],
            ],
        ];

        foreach ($expositionGroups as $exposition_name => $groups) {
            $exposition = Exposition::where('name', $exposition_name)->first();

            foreach ($groups as $group) {
                $newGroup = new ExpositionGroup();
                $newGroup->id = uniqid();
                $newGroup->name = $group["name"];
                $newGroup->calculation = serialize($group["calculation"]);
                $newGroup->intervention_type_label = $group["intervention_type_label"];
                $newGroup->value_label = $group["value_label"];
                $newGroup->duration = $group["duration"];
                $newGroup->type = $group["type"];
                $newGroup->exposition()->associate($exposition);
                $newGroup->save();
            }
        }
    }
}
