<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\SectorActivitie;
use App\Models\SubItem;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubItemController extends Controller
{
    public function edit($id_subitem)
    {

        $subitem = SubItem::find($id_subitem);

        $page = [
            'title' => 'Modifier la catégorie : '.$subitem->name,
            'url_back' => route('admin.help.item'),
            'text_back' => 'Retour vers les items',
            'sidebar' => 'help',
            'sub_sidebar' => 'item'
        ];

        return view('admin.subitem.edit', compact('page','subitem'));
    }

    public function update(Request $request, $id_subitem){

        $request->validate([
            'name_subitem' => 'required'
        ]);

        $subitem = SubItem::find($id_subitem);

        if (!$subitem) return back()->with('status','Un problème est survenue')->with('status_type','danger');

        $subitem->name = $request->name_subitem;
        $subitem->save();

        return redirect()->route('admin.help.item')->with('status', 'La catégorie a bien été modifiée !');
    }
}
