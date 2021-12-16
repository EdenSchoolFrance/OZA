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
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ClientSeeder::class);

        $this->call(UpdateUserSeeder::class);

        $this->call(DangerSeeder::class);

        $this->call(SingleDocumentSeeder::class);

        $this->call(SdDangerSeeder::class);

        $this->call(DocSeeder::class);
    }
}
