<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;

class UpdateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::where('name', 'Biocoop')->first();

        $user = User::where('email', 'adminclient@gmail.com')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('email', 'managerclient@gmail.com')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('email', 'editorclient@gmail.com')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('email', 'readerclient@gmail.com')->first();
        $user->client()->associate($client);
        $user->save();
    }
}
