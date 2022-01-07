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
        $work_unit = SdWorkUnit::where('name', 'test')->first();

        $activity = new SdActivitie();
        $activity->id = uniqid();
        $activity->text = "Test du test qui deviens un test";
        $activity->work_unit()->associate($work_unit);
        $activity->save();
    }
}
