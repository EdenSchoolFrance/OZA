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

        $sector = new SectorActivitie();
        $sector->id = uniqid();
        $sector->name = 'Sector1';
        $sector->save();

        $sector = new SectorActivitie();
        $sector->id = uniqid();
        $sector->name = 'Sector2';
        $sector->save();
    }
}
