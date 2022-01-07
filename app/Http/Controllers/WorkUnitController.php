<?php

namespace App\Http\Controllers;

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

class WorkUnitController extends Controller
{
    public function index($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Définition des unités de travail',
            'infos' => 'L’article R.4121-1 du Code du travail « DOCUMENT UNIQUE D’EVALUATION DES RISQUES » précise :
            « Cette évaluation comporte un inventaire des risques identifiés dans chaque unité de travail de l’entreprise ou de l’établissement ».
            Le législateur n’a pas défini « l’unité de travail ». Nous l’entendons ici comme un poste de travail, un métier ou une activité.
            Les unités de travail sont détaillées dans la partie « Présentation de la structure » à partir de la page 5 de ce Document Unique.
            ',
            'sidebar' => 'structure',
            'sub_sidebar' => 'work_units'
        ];

        $works = SdWorkUnit::whereHas('single_document', function ($q) use ($id) {
            $q->where('id', $id);
        })->get();

        $items = Item::all();

        return view('app.work_unit.index', compact('page', 'single_document','works','items'));
    }

    public function create($id,$id_work = null)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer une unité de travail ',
            'link_back' => route('work.index', [$id]),
            'text_back' => 'Retour vers les unités de travail',
            'sidebar' => 'structure',
            'sub_sidebar' => 'work_units'
        ];

        $items = Item::all();

        $sectors = SectorActivitie::all();

        $works = WorkUnit::all()->take(10);

        if ($id_work !== null && Auth::user()->oza){
            $workUnit = WorkUnit::find($id_work);

            return view('app.work_unit.create', compact('page', 'single_document', 'items','sectors','works','workUnit'));
        }else{
            return view('app.work_unit.create', compact('page', 'single_document', 'items','sectors','works'));
        }
    }

    public function edit($id,$id_work)
    {
        $single_document = $this->checkSingleDocument($id);


        $work = SdWorkUnit::find($id_work);

        $page = [
            'title' => 'Modifier l\'unité de travail : '.$work->name,
            'link_back' => route('work.index', [$id]),
            'text_back' => 'Retour vers les unités de travail',
            'sidebar' => 'structure',
            'sub_sidebar' => 'work_units'
        ];

        $items = Item::all();

        return view('app.work_unit.edit', compact('page', 'single_document','work','items'));
    }

    public function store(Request $request, $id){

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'name_enterprise' => 'required',
            'number_employee' => 'required|min:1',
            'type' => 'required',
            'activities' => 'required|array'
        ]);

        $work = new SdWorkUnit();
        $work->id = uniqid();
        $work->name = $request->name_enterprise;
        $work->number_employee = $request->number_employee;
        if ($request->type === 'true') $work->validated = 1; else $work->validated = 0;
        $work->single_document()->associate($single_document);
        $work->save();

        foreach ($request->activities as $activitie) {
            $acti = new SdActivitie();
            $acti->id = uniqid();
            $acti->text = $activitie;
            $work->activities()->save($acti);
            $acti->save();

        }

        //Get all example item
        $items = Item::all();
        foreach ($items as $item){



            foreach ($item->sub_items as $sub_item){
                $name = $item->id.'-'.$sub_item->id;


                if (isset($request->$name)){
                    foreach ($request->$name as $child_sub_item){

                        $sd_item = new SdItem();
                        $sd_item->id = uniqid();
                        $sd_item->name = $child_sub_item;
                        $sd_item->sub_item()->associate($sub_item);
                        $sd_item->sd_work_unit()->associate($work);
                        $sd_item->save();

                    }
                }
            }

        }
        return redirect()->route('work.index', [$single_document->id]);
    }


    public function update(Request $request, $id, $id_work){

        $single_document = $this->checkSingleDocument($id);

        $request->validate([
            'name_enterprise' => 'required',
            'number_employee' => 'required|min:1',
            'type' => 'required',
            'activities' => 'required|array'
        ]);


        $work = new SdWorkUnit();
        $work->id = uniqid();
        $work->name = $request->name_enterprise;
        $work->number_employee = $request->number_employee;
        if ($request->type === 'true') $work->validated = 1; else $work->validated = 0;
        $work->single_document()->associate($single_document);
        $work->save();

        foreach ($request->activities as $activitie){
            $acti = new SdActivitie();
            $acti->id = uniqid();
            $acti->text = $activitie;
            $work->activities()->save($acti);
            $acti->save();
        }
        $work1 = SdWorkUnit::find($id_work);

        $items = Item::all();
        foreach ($items as $item){

            foreach ($item->sub_items as $sub_item){
                $name = $item->id.'-'.$sub_item->id;


                if (isset($request->$name)){
                    foreach ($request->$name as $child_sub_item){

                        $sd_item = new SdItem();
                        $sd_item->id = uniqid();
                        $sd_item->name = $child_sub_item;
                        $sd_item->sub_item()->associate($sub_item);
                        $sd_item->sd_work_unit()->associate($work);
                        $sd_item->save();

                    }
                }
            }

        }

        $work1->delete();

        return redirect()->route('work.index', [$single_document->id]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $work_unit = SdWorkUnit::find($request->id);

        if ($work_unit) {
            $work_unit->delete();
        }

        return back()->with('status', 'L\'unité de travail a bien été supprimé !');
    }

    public function filter(Request $request, $id){

        $single_document = $this->checkSingleDocument($id);

        if ($request->ajax()){

            if (empty($request->filterUt)){
                if ($request->filterSa === 'none'){
                    $data = WorkUnit::all();
                }else{
                    $data = WorkUnit::whereHas('sector_activitie', function ($q) use ($request) {
                        $q->where('id', $request->filterSa);
                    })->get();
                }

            }else if ($request->filterSa === 'none' && $request->filterUt){
                $data = WorkUnit::where('name', 'like', '%' . $request->filterUt . '%')->get();
            }else{

                $data = WorkUnit::whereHas('sector_activitie', function ($q) use ($request) {
                    $q->where('id', $request->filterSa);
                })->where('name', 'like', '%' . $request->filterUt . '%')->get();

            }

            return response()->json($data);

        }

        abort(404);

    }

}
