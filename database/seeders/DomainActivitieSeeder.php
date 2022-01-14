<?php

namespace Database\Seeders;

use App\Models\DomainActivitie;
use Illuminate\Database\Seeder;

class DomainActivitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activitie = new DomainActivitie();
        $activitie->id = uniqid();
        $activitie->name = "Boulanger";
        $activitie->save();

        $activitie = new DomainActivitie();
        $activitie->id = uniqid();
        $activitie->name = "Boucher";
        $activitie->save();
    }
}
