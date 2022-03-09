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

    public function create()
    {

        $page = [
            'title' => 'Créer une unité de travail (complétion) ',
            'url_back' => route('admin.help.workunit'),
            'text_back' => 'Retour vers les unités de travail (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'work_unit'
        ];

        $items = Item::all();

        $sectors_activities = SectorActivitie::all();

        return view('admin.work_unit.create', compact('page','items','sectors_activities'));
    }

    public function edit($id_work)
    {

        $work = WorkUnit::find($id_work);

        $page = [
            'title' => 'Modifier l\'unité de travail : '.$work->name,
            'url_back' => route('admin.help.workunit'),
            'text_back' => 'Retour vers les unités de travail (complétion)',
            'sidebar' => 'help',
            'sub_sidebar' => 'work_unit'
        ];

        $items = Item::all();

        $sectors_activities = SectorActivitie::all();

        return view('admin.work_unit.edit', compact('page','work','items','sectors_activities'));
    }

    public function store(Request $request){

        $request->validate([
            'name_enterprise' => 'required',
            'sector_activitie' => 'required',
            'activities' => 'required|array'
        ]);

        $sector = SectorActivitie::find($request->sector_activitie);

        if (!$sector) return back()->with('status','Un problème est survenue')->with('status-type','danger');

        $work = new WorkUnit();
        $work->id = uniqid();
        $work->name = $request->name_enterprise;
        $work->sector_activitie()->associate($sector);
        $work->save();

        foreach ($request->activities as $activitie) {
            $acti = new Activitie();
            $acti->id = uniqid();
            $acti->text = $activitie;
            $work->activitie()->save($acti);
            $acti->save();
        }

        //Get all example item
        $items = Item::all();
        foreach ($items as $item){



            foreach ($item->sub_items as $sub_item){
                $name = $item->id.'-'.$sub_item->id;


                if (isset($request->$name)){
                    foreach ($request->$name as $child_sub_item){

                        $sd_item = new ChildSubItem();
                        $sd_item->id = uniqid();
                        $sd_item->name = $child_sub_item;
                        $sd_item->sub_item()->associate($sub_item);
                        $sd_item->save();
                        $sd_item->work_unit()->save($work);

                    }
                }
            }

        }
        return redirect()->route('admin.help.workunit');
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

        return redirect()->route('admin.help.item');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $work_unit = WorkUnit::find($request->id);

        if (!$work_unit) return back()->with('status','Un problème est survenue')->with('status-type','danger');
        $work_unit->delete();

        return back()->with('status', 'L\'unité de travail a bien été supprimé !');
    }
}
