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
        $expert_oza = User::where('email', 'expertoza@gmail.com')->first();

        $client = Client::where('name','Biocoop')->first();
        $client->expert()->associate($expert_oza);
        $client->save();

    }
}
