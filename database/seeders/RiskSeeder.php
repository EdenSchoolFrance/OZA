<?php

namespace Database\Seeders;

use App\Models\Danger;
use App\Models\DomainActivitie;
use App\Models\Risk;
use Illuminate\Database\Seeder;

class RiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accident = Danger::where('name','Accident')->first();
        $boulanger = DomainActivitie::where('name','Boulanger')->first();
        $boucher = DomainActivitie::where('name','Boucher')->first();

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = 'Risk1';
        $risk->frequency = 'year+';
        $risk->probability = 'very weak';
        $risk->gravity = 'weak impact';
        $risk->impact = 'female';
        $risk->danger()->associate($accident);
        $risk->domain_activitie()->associate($boulanger);
        $risk->save();

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = 'Risk2';
        $risk->frequency = 'year+';
        $risk->probability = 'very weak';
        $risk->gravity = 'weak impact';
        $risk->impact = 'female';
        $risk->danger()->associate($accident);
        $risk->domain_activitie()->associate($boulanger);
        $risk->save();

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = 'Risk3';
        $risk->frequency = 'year+';
        $risk->probability = 'very weak';
        $risk->gravity = 'weak impact';
        $risk->impact = 'female';
        $risk->danger()->associate($accident);
        $risk->domain_activitie()->associate($boucher);
        $risk->save();

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = 'Risk4';
        $risk->frequency = 'year+';
        $risk->probability = 'very weak';
        $risk->gravity = 'weak impact';
        $risk->impact = 'female';
        $risk->danger()->associate($accident);
        $risk->domain_activitie()->associate($boucher);
        $risk->save();

        $risk = new Risk();
        $risk->id = uniqid();
        $risk->name = 'Risk5';
        $risk->frequency = 'year+';
        $risk->probability = 'very weak';
        $risk->gravity = 'weak impact';
        $risk->impact = 'female';
        $risk->danger()->associate($accident);
        $risk->domain_activitie()->associate($boucher);
        $risk->save();
    }
}
