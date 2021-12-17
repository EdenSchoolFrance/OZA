<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Danger;
use App\Models\SingleDocument;
use Illuminate\Database\Seeder;

class SingleDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::where('name', 'Biocoop')->first();
        $user = User::where('lastname', 'Latsname Admin Client')->first();

        $sd = new SingleDocument();
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
        $sd->client()->associate($client);
        $sd->save();
        $sd->users()->attach($user);
    }
}
