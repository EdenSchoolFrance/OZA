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

        $user = User::where('lastname', 'Latsname Admin Client')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('lastname', 'Latsname Manager Client')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('lastname', 'Latsname Editor Client')->first();
        $user->client()->associate($client);
        $user->save();

        $user = User::where('lastname', 'Latsname Reader Client')->first();
        $user->client()->associate($client);
        $user->save();
    }
}
