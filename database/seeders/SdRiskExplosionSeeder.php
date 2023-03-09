<?php

namespace Database\Seeders;

use App\Models\SdRiskExplosion;
use App\Models\SingleDocument;
use Illuminate\Database\Seeder;

class SdRiskExplosionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singleDocument = SingleDocument::where('name', 'Siege')->first();
        $rc = new SdRiskExplosion();
        $rc->id = uniqid();
        $rc->material_explosion = "Acétylène";
        $rc->features = "H220 Gaz extrêmement inflammable.";
        $rc->material_setup = "Chalumeau à l'exception du tuyau et des raccords";
        $rc->source_clean = "Chalumeau";
        $rc->degree_clean = "2e degré";
        $rc->degree_ventilation = "Moyen";
        $rc->availability_ventilation = "Assez bonne";
        $rc->size_area = "Hors zone ATEX sous réserve de l'entretien et des contrôles périodiques.";
        $rc->gas = 2;
        $rc->dust = 20;
        $rc->spawn_probability = 3;
        $rc->prevention_probability = 3;
        $rc->single_document()->associate($singleDocument);
        $rc->save();
    }
}
