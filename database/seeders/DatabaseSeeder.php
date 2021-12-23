<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\SubItem;
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

        $this->call(SdWorkUnitSeeder::class);

        $this->call(SdActivitieSeeder::class);

        $this->call(ItemSeeder::class);

        $this->call(SdItemSeeder::class);

        $this->call(SubItemSeeder::class);

        $this->call(ChildSubItemSeeder::class);





    }
}
