<?php

namespace Database\Seeders;

use App\Models\ChildSubItem;
use App\Models\SubItem;
use App\Models\WorkUnit;
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
            $child->sub_item()->associate($sub_item);
            $child->save();

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 2';
            $child->sub_item()->associate($sub_item);
            $child->save();

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 3';
            $child->sub_item()->associate($sub_item);
            $child->save();

        }

        $workUnit1 = WorkUnit::where('name','WorkUnit1')->get();

        foreach ($sub_items as $sub_item){

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 1 (WorkUnit1)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit1);

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 2 (WorkUnit1)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit1);

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 3 (WorkUnit1)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit1);

        }

        $workUnit2 = WorkUnit::where('name','WorkUnit2')->get();

        foreach ($sub_items as $sub_item){

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 1 (WorkUnit2)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit2);

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 2 (WorkUnit2)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit2);

            $child = new ChildSubItem();
            $child->id = uniqid();
            $child->name = 'Item 3 (WorkUnit2)';
            $child->sub_item()->associate($sub_item);
            $child->save();
            $child->work_unit()->attach($workUnit2);

        }

    }
}
