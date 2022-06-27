<?php

namespace Database\Seeders;

use App\Models\Danger;
use App\Models\Exposition;
use Illuminate\Database\Seeder;

class ExpositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expositions = [
            [
                "name" => "exposition_activity",
                "info" => "les interventions ou travaux ne doivent pas dépasser une intensité de 1 200 hectopascals,soit 12 mètres, </br> à raison de 60 interventions ou travaux par an maximum",
                "alert" => "l’exposition étant critique, veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.",
                "danger" => "Milieu hyperbare"
            ],
            [
                "name" => "exposition_temperature",
                "info" => "L’ambiance thermique de travail (hors températures extérieures) ne doit pas être <= 5 °C et ou  >= 30 °C plus de 900 heures par an.",
                "alert" => "l’exposition étant critique, veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.",
                "danger" => "Températures extrêmes"
            ],
            [
                "name" => "exposition_noise",
                "info" => "Le niveau d’exposition au bruit rapporté à une période de référence de huit heures ne peut dépasser au moins 81 décibels (A) plus de 600 h / an. </br> L’exposition à un niveau de pression acoustique de crête ne doit pas dépasser 135 décibels (C) plus de 120 fois / an.",
                "alert" => "l’exposition étant critique, veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.",
                "danger" => "Bruit"
            ],
            [
                "name" => "exposition_night_work",
                "info" => "Il n’est pas possible d’effectuer une heure de travail entre 24 heures et 5 heures (hors nuits effectuées dans le cadre d’équipes successives alternantes) plus de 120 nuits par an. Et Le travail en équipes successives alternantes impliquant au minimum une heure de travail entre 24 heures et 5 heures ne doit pas avoir lieu plus de 50 nuits par an.",
                "alert" => "l’exposition étant critique, veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.",
                "danger" => "Travail de nuit"
            ],
            [
                "name" => "exposition_repetitive_work",
                "info" => "Le travail répétitif ne doit pas dépasser plus de 900 heures par an incluant : </br> - les temps pendant lesquels plus de 15 actions techniques sont réalisées sur un temps de cycle inférieur ou égal à 30 secondes </br> - ET les temps pendant lesquels plus de 30 actions techniques par minute sont réalisées sur un temps de cycle supérieur à 30 secondes ou sur un temps de cycle variable ou si absence de cycle",
                "alert" => "l’exposition étant critique, veuillez vous assurer que les mesures proposées lors de l’évaluation des risques de l’UT vous permettent d’agir sur ce facteur.",
                "danger" => "Travail répétitif"
            ],
        ];

        foreach ($expositions as $exposition) {
            $danger = Danger::where('name', $exposition["danger"])->first();

            $newExposition = new Exposition();
            $newExposition->id = uniqid();
            $newExposition->name = $exposition["name"];
            $newExposition->info = $exposition["info"];
            $newExposition->alert = $exposition["alert"];
            $newExposition->danger()->associate($danger);
            $newExposition->save();
        }
    }
}
