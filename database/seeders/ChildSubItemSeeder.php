<?php

namespace Database\Seeders;

use App\Models\ChildSubItem;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class ChildSubItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sub_items = SubItem::all();

        foreach ($sub_items as $sub_item){

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 1';
            $sub_item->child()->save($child);
            $child->save();

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 2';
            $sub_item->child()->save($child);
            $child->save();

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 3';
            $sub_item->child()->save($child);
            $child->save();

        }

    }
}
