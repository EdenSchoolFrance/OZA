<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item();
        $item->id = uniqid();
        $item->name = 'Matériels';
        $item->save();

        $item = new Item();
        $item->id = uniqid();
        $item->name = 'Véhicules';
        $item->save();

        $item = new Item();
        $item->id = uniqid();
        $item->name = 'Engins';
        $item->save();

    }
}
