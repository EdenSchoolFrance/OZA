<?php

namespace Database\Seeders;

use App\Models\Single_documents;
use Illuminate\Database\Seeder;

class Single_documentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sd = new Single_documents();
        $sd->id = uniqid();
        $sd->name_entrepise = "Biocoop";
        $sd->adress = "12 rue du louvre";
        $sd->city_zipcode = "75000";
        $sd->city = "Paris";
        $sd->description = "Bicoop description";
        $sd->firstname = "Jhon";
        $sd->lastname = "Doe";
        $sd->email = "jhon.doe@bicoop.fr";
        $sd->phone = "0614875412";
    }
}
