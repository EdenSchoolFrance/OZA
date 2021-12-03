<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expert_oza = User::where('lastname', 'Latsname Expert Oza')->first();

        $client = new Client();
        $client->id = uniqid();
        $client->name = "Biocoop";
        $client->client_number = "087474175";
        $client->adress = "12 rue du louvre";
        $client->city_zipcode = "75000";
        $client->city = "Paris";
        $client->firstname = "Jhon";
        $client->lastname = "Doe";
        $client->email = "jhon.doe@bicoop.fr";
        $client->phone = "0614875412";
        $client->experts()->attach($expert_oza);
        $client->save();

    }
}
