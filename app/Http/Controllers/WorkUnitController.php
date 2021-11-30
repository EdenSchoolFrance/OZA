<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index(){
        $this->verifLogin();

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

        return view('app.work_unit.index', compact('page'));
    }

    public function create(){
        $this->verifLogin();

        $page = [
            'title' => 'Créer une unité de travail ',
            'link_back' => '/work',
            'text_back' => 'Retour vers les unités de travail',
            'sidebar' => 'structure',
            'sub_sidebar' => 'work_units'
        ];

        return view('app.work_unit.create', compact('page'));
    }

    public function createNew(){
        $this->verifLogin();

        $page = [
            'title' => 'Créer une unité de travail',
            'link_back' => '/work',
            'text_back' => 'Retour vers les unités de travail',
            'sidebar' => 'risk_pro',
            'sub_sidebar' => 'accident'
        ];

        return view('app.work_unit.createNew',compact('page'));
    }
}
