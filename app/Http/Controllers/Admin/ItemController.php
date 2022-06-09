<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activitie;
use App\Models\ChildSubItem;
use App\Models\Item;
use App\Models\SdActivitie;
use App\Models\SdItem;
use App\Models\SdWorkUnit;
use App\Models\SectorActivitie;
use App\Models\SubItem;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {

        $page = [
            'title' => 'Item des unités de travail (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'item'
        ];

        $items = Item::all();

        $child_sub_items = ChildSubItem::all();

        return view('admin.item.index', compact('page','items','child_sub_items'));
    }


    public function update(Request $request){

        $child_sub_items = ChildSubItem::all();
        foreach ($child_sub_items as $child_sub_item){
            if (isset( $request->child[$child_sub_item->id] )){
                $child_sub_item->name = $request->child[$child_sub_item->id];
                $child_sub_item->save();
            }else{
                $child_sub_item->delete();
            }
        }

        if (isset($request->new_child)){
            foreach ($request->new_child as $key => $child){
                $find_item = SubItem::find(explode('_', $key)[0]);
                if ($find_item){
                    if (!empty($child)){
                        $new_child = new ChildSubItem();
                        $new_child->id = uniqid();
                        $new_child->name = $child;
                        $new_child->sub_item()->associate($find_item);
                        $new_child->save();
                    }
                }
            }
        }

        return redirect()->route('admin.help.item');
    }
}
