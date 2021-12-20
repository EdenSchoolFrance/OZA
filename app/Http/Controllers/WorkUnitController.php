<?php

namespace App\Http\Controllers;

use App\Models\Item;
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

        return view('app.work_unit.index', compact('page', 'single_document'));
    }

    public function create($id)
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

        return view('app.work_unit.create', compact('page', 'single_document','items'));
    }

    public function createNew($id)
    {
        $single_document = $this->checkSingleDocument($id);

        $page = [
            'title' => 'Créer une unité de travail',
            'link_back' => route('work.index', [$id]),
            'text_back' => 'Retour vers les unités de travail',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        return view('app.work_unit.createNew', compact('page', 'single_document'));
    }

    public function test(Request $request){

        $items = Item::all();
        foreach ($items as $item){
            foreach ($item->sub_items as $sub_item){
                $name = $item->id.'-'.$sub_item->id;
                var_dump($request->$name);
            }
        }

    }
}
