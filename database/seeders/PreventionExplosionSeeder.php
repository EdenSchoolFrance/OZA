<?php

namespace Database\Seeders;

use App\Models\PreventionExplosion;
use Illuminate\Database\Seeder;

class PreventionExplosionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Faibles quantités.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Affichage réglementaire zone ATEX et interdiction de fumer.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Affichage réglementaire zone ATEX.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Affichage réglementaire interdiction de fumer.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Rack de bouteilles disposé en extérieur.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Vérification réglementaire périodique effectuée par un organisme agréé.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Affichage réglementaire pas de téléphone portable.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Alarme d'arrêt de fonctionnement de la ventilation.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Fonctionnement permanent de la ventilation de la cabine.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Entretien et contrôles périodiques.";
        $prevention->save();

        $prevention = new PreventionExplosion();
        $prevention->id = uniqid();
        $prevention->name = "Liaisons équipotentielles.";
        $prevention->save();
    }
}
