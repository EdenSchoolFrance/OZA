<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;

class UpdateClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expert_oza = User::where('lastname', 'Latsname Expert Oza')->first();

        $client = Client::where('name','Biocoop')->first();
        $client->experts()->attach($expert_oza);
        $client->save();

    }
}
