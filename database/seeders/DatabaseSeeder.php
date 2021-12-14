<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ClientSeeder::class);

        $this->call(UpdateUserSeeder::class);

        $this->call(SingleDocumentSeeder::class);

        $this->call(DangerSeeder::class);
    }
}
