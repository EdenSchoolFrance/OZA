<?php

namespace Database\Seeders;

use App\Models\RestraintExplosion;
use Illuminate\Database\Seeder;

class RestraintExplosionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Néant";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = 'Afficher le panneau réglementaire de "Zone ATEX" dans les zones de charge.';
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = 'Afficher le panneau réglementaire de "Zone ATEX".';
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Garantir le fonctionnement de la ventilation mécanique, par exemple avec une alarme d'arrêt de fonctionnement.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Contrôler la présence et la conductivité des liaisons équipotentielles.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Stocker dans une armoire de sécurité destinée au stockage de produits inflammables.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Tenir l'installation propre.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Vider très régulièrement le bac de récupération des poussières.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Maintenir l'installation électrique en parfait état.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Lors du remplacement du dépoussiéreur, choisir un dépoussiéreur ATEX.";
        $restraint->save();

        $restraint = new RestraintExplosion();
        $restraint->id = uniqid();
        $restraint->name = "Afficher le pictogramme réglementaire ATEX.";
        $restraint->save();
    }
}
