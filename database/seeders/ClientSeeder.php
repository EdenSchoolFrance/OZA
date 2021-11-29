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
        $client->name = "Client Test";
        $client->save();
        $client->experts()->attach($expert_oza);
    }
}
