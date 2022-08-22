<?php

namespace Database\Seeders;

use App\Models\SectorActivitie;
use Illuminate\Database\Seeder;

class SectorActivitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            "Administration publique",
            "Agriculture & forêts",
            "Agroalimentaire",
            "Ambulance et taxi",
            "Animaux",
            "Artisanat",
            "Association sauf sport",
            "Auto-école",
            "Auto-moto",
            "Autre",
            "Banque et assurance",
            "Boulangerie pâtisserie snacking",
            "BTP",
            "Bureau d'études et architecture",
            "Bureaux",
            "Coiffure et esthétique",
            "Commerce de détail",
            "Commerce de gros",
            "Communication",
            "Culture",
            "Education",
            "Enfance",
            "Fédération professionnelle",
            "Formation pour adultes",
            "Gardiennage et sécurité",
            "Grande distribution",
            "Hôtellerie & restauration",
            "Hôtellerie de plein-air",
            "Immobilier",
            "Industrie",
            "Informatique",
            "Location",
            "Logistique",
            "Médical & paramédical",
            "Métiers du luxe",
            "Métiers du spectacle",
            "Nautisme",
            "Paysagiste",
            "Services aux entreprises",
            "Services aux personnes",
            "Sport",
            "Tourisme",
            "Tous",
            "Transport"
        ];

        for ($i = 0; $i < count($data); $i++) {
            $sector = new SectorActivitie();
            $sector->id = uniqid();
            $sector->name = $data[$i];
            $sector->save();
        }

    }
}
