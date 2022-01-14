<?php

namespace Database\Seeders;

use App\Models\Restraint;
use App\Models\Risk;
use Illuminate\Database\Seeder;

class RestraintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $risks = Risk::all();

        foreach ($risks as $risk){

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = 'Restraint 1';
            $restraint->risk()->associate($risk);
            $restraint->save();

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = 'Restraint 2';
            $restraint->risk()->associate($risk);
            $restraint->save();

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = 'Restraint 3';
            $restraint->risk()->associate($risk);
            $restraint->save();

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = 'Restraint 4';
            $restraint->risk()->associate($risk);
            $restraint->save();

            $restraint = new Restraint();
            $restraint->id = uniqid();
            $restraint->name = 'Restraint 5';
            $restraint->risk()->associate($risk);
            $restraint->save();

        }
    }
}
