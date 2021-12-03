<?php

namespace Database\Seeders;

use App\Models\Single_document;
use App\Models\User;
use Illuminate\Database\Seeder;

class Single_documentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = User::where('lastname', 'Latsname SuperAdmin Client')->first();

        $sd = new Single_document();
        $sd->id = uniqid();
        $sd->name = "Siege";
        $sd->name_enterprise = "Biocoop";
        $sd->adress = "12 rue du louvre";
        $sd->city_zipcode = "75000";
        $sd->city = "Paris";
        $sd->description = "Bicoop description";
        $sd->firstname = "Jhon";
        $sd->lastname = "Doe";
        $sd->email = "jhon.doe@bicoop.fr";
        $sd->phone = "0614875412";
        $sd->save();
        $sd->user()->attach($client);

    }
}
