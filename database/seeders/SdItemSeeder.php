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

        $sub_items = SubItem::all();

        $works = SdWorkUnit::all();

        foreach ($works as $work){

            foreach ($sub_items as $sub_item){

                $child = new SdItem();
                $child->id = uniqid();
                $child->name = 'Item 1';
                $child->sub_item()->associate($sub_item);
                $child->sd_work_unit()->associate($work);
                $child->save();

                $child = new SdItem();
                $child->id = uniqid();
                $child->name = 'Item 2';
                $child->sub_item()->associate($sub_item);
                $child->sd_work_unit()->associate($work);
                $child->save();

                $child = new SdItem();
                $child->id = uniqid();
                $child->name = 'Item 3';
                $child->sub_item()->associate($sub_item);
                $child->sd_work_unit()->associate($work);
                $child->save();


            }
        }
    }
}
