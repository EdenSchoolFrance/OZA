<?php

namespace Database\Seeders;

use App\Models\ExpositionGroup;
use App\Models\ExpositionQuestion;
use Illuminate\Database\Seeder;

class ExpositionQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expositionGroupQuestions = [
            "exposition_group_intervention" => [
                [
                    "intensity" => ">= 1 200 hectopascals, soit 12 mètres max",
                    "options" => null
                ],
            ],
            "exposition_group_thermal_environment" => [
                [
                    "intensity" => "T° <= 5 °C",
                    "options" => null
                ],
                [
                    "intensity" => "T° >= 30°C",
                    "options" => null
                ],
            ],
            "exposition_group_noise_level" => [
                [
                    "intensity" => "> 81 décibels (A)",
                    "options" => null
//                        [
//                        "L’utilisation des outils électroportatifs et machines listés dans la partie \"Présentation de la structure\" sur l'année ne génère pas un niveau d'exposition au bruit rapporté à une période de référence de huit heures supérieur à 81 dB(A).",
//                        "L’utilisation des outils électroportatifs et machines listés dans la partie \"Présentation de la structure\" sur l’année ne génère pas un niveau d’exposition au bruit rapporté à une période de référence de huit heures supérieur à 81 dB(A) grâce au port permanent de protections auditives.",
//                        "L’exposition aux bruits des chantiers et l’utilisation des outils électroportatifs et machines listés dans la partie \"Présentation de la structure\" sur l’année ne génère pas un niveau d’exposition au bruit rapporté à une période de référence de huit heures supérieur à 81 dB(A).",
//                        "L’exposition aux bruits des chantiers et l’utilisation des outils électroportatifs et machines listés dans la partie \"Présentation de la structure\" sur l’année ne génère pas un niveau d’exposition au bruit rapporté à une période de référence de huit heures supérieur à 81 dB(A) grâce au port permanent de protections auditives.",
//                        "Les activités, les matériels et l’environnement de l’unité de travail ne génèrent pas un niveau d’exposition au bruit rapporté à une période de référence de huit heures supérieur à 81 dB(A)."
//                    ]
                ],
            ],
            "exposition_group_sound_pressure_level" => [
                [
                    "intensity" => "> 135 décibels (A)",
                    "options" => null
                ],
            ],
            "exposition_group_night_work" => [
                [
                    "intensity" => "Travail de jour : de 5h00 à 00h00",
                    "options" => null
                ],
            ],
            "exposition_group_team_work" => [
                [
                    "intensity" => "Travail de jour : de 5h00 à 00h00",
                    "options" => null
                ],
            ],
            "exposition_group_repetitive_work" => [
                [
                    "intensity" => " <= 30 sec, \n pour 15 actions \n techniques ou plus",
                    "options" => null
                ],
                [
                    "intensity" => ">= 30 sec,  variable ou absent, \n pour 30 actions \n techniques ou plus",
                    "options" => null
                ],
            ],
        ];

        foreach ($expositionGroupQuestions as $expositionGroup_name => $questions) {
            $expositionGroup = ExpositionGroup::where('name', $expositionGroup_name)->first();

            foreach ($questions as $question) {
                $newQuestion = new ExpositionQuestion();
                $newQuestion->id = uniqid();
                $newQuestion->intensity = $question["intensity"];
                if ($question["options"]) {
                    $newQuestion->options = serialize($question["options"]);
                }
                $newQuestion->exposition_group()->associate($expositionGroup);
                $newQuestion->save();
            }
        }
    }
}
