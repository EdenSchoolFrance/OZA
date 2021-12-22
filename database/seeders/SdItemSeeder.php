<?php

namespace Database\Seeders;

use App\Models\SdItem;
use App\Models\SdWorkUnit;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class SdItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work = SdWorkUnit::where('name','test')->first();

        $item = new SdItem();
        $item->id = uniqid();
        $item->name = 'Matériels';
        $item->work()->associate($work);
        $item->save();

        $item = new SdItem();
        $item->id = uniqid();
        $item->name = 'Véhicules';
        $item->work()->associate($work);
        $item->save();

        $item = new SdItem();
        $item->id = uniqid();
        $item->name = 'Engins';
        $item->work()->associate($work);
        $item->save();

    }
}
