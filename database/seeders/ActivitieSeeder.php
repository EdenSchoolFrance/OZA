<?php

namespace Database\Seeders;

use App\Models\Activitie;
use Illuminate\Database\Seeder;

class ActivitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activiti = new Activitie();
        $activiti->id = uniqid();
        $activiti->text = 'test du test qui deviens lui meme un test';
        $activiti->save();

        $activiti = new Activitie();
        $activiti->id = uniqid();
        $activiti->text = 'test du test qui deviens lui meme un test mais version 2';
        $activiti->save();
    }
}
