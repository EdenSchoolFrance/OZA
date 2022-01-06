<?php

namespace Database\Seeders;

use App\Models\SdActivitie;
use App\Models\SdWorkUnit;
use Illuminate\Database\Seeder;

class SdActivitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work = SdWorkUnit::where('name','test')->first();

        $acti = new SdActivitie();
        $acti->id = uniqid();
        $acti->text = "Test du test qui deviens un test";
        $work->activitie()->save($acti);
        $acti->save();
    }
}
