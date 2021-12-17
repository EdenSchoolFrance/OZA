<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pack = new Pack();
        $pack->id = uniqid();
        $pack->name = "compliance";
        $pack->save();

        $pack = new Pack();
        $pack->id = uniqid();
        $pack->name = "tranquility";
        $pack->save();

        $pack = new Pack();
        $pack->id = uniqid();
        $pack->name = "serenity";
        $pack->save();
    }
}
