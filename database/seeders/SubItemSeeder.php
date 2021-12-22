<?php

namespace Database\Seeders;

use App\Models\ChildSubItem;
use App\Models\Item;
use App\Models\SdItem;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class SubItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mat = Item::where('name','Matériels')->first();
        $veh = Item::where('name','Véhicules')->first();
        $eng = Item::where('name','Engins')->first();

        $mat2 = SdItem::where('name','Matériels')->first();
        $veh2 = SdItem::where('name','Véhicules')->first();
        $eng2 = SdItem::where('name','Engins')->first();


        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Communication';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Bureautique';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();


        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 3';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 4';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 5';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 6';
        $sub_item->item()->associate($mat);
        $sub_item->sd_item()->associate($mat2);
        $sub_item->save();

        /*===============================
            VEHICULE Section
        ===============================*/

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Deux roues';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Véhicules léger';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 3';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 4';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 5';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 6';
        $sub_item->item()->associate($veh);
        $sub_item->sd_item()->associate($veh2);
        $sub_item->save();

        /*===============================
            VEHICULE Section
        ===============================*/

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Deux roues';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Véhicules léger';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 3';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 4';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 5';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();

        $sub_item = new SubItem();
        $sub_item->id = uniqid();
        $sub_item->name = 'Sous-catégorie 6';
        $sub_item->item()->associate($eng);
        $sub_item->sd_item()->associate($eng2);
        $sub_item->save();
    }
}
