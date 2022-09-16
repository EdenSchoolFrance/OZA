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
        $expert_oza = User::where('email', 'expertoza@gmail.com')->first();

        $client = new Client();
        $client->id = uniqid();
        $client->name = "Biocoop";
        $client->image = '6731993HDX23.png';
        $client->client_number = "087474175";
        $client->adress = "12 rue du louvre";
        $client->city_zipcode = "75000";
        $client->city = "Paris";
        $client->expert()->associate($expert_oza);
        $client->save();

        $client = new Client();
        $client->id = uniqid();
        $client->name = "Test";
        $client->image = '6731993HDX23.png';
        $client->client_number = "087474175";
        $client->adress = "12 rue du louvre";
        $client->city_zipcode = "75000";
        $client->city = "Paris";
        $client->expert()->associate($expert_oza);
        $client->save();
    }
}
