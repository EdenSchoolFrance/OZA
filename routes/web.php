<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    $page = [
        'title' => 'Présentation de la structure',
        'sidebar' => 'structure',
        'sub_sidebar' => 'presentation'
    ];

    return view('dashboard.index', compact('page'));
});
Route::get('/user', function () {
    $page = [
        'title' => 'Utilisateurs',
        'infos' => 'Seul le responsable du DU peut valider la finalisation du DU',
        'sidebar' => 'structure',
        'sub_sidebar' => 'users'
    ];

    return view('user.index', compact('page'));
});
Route::get('/work', function () {
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

    return view('work_unit.index', compact('page'));
});
Route::get('/work/create/', function () {
    $page = [
        'title' => 'Créer une unité de travail ',
        'link_back' => '/work',
        'text_back' => 'Retour vers les unités de travail',
        'sidebar' => 'structure',
        'sub_sidebar' => 'work_units'
    ];

    return view('work_unit.create', compact('page'));
})->name('work.create');

Route::get('/work/create/new', function () {
    return view('dashboard.createNew');
});

Route::get('/risk/accident', function () {
    $page = [
        'title' => 'Evaluation des risques professionnels',
        'dangers' => 'Accident, presqu’accident et maladie du travail non ou mal analysés et prévenus pouvant générer la répétition de ces faits.',
        'sidebar' => 'risk_pro',
        'sub_sidebar' => 'accident'
    ];

    return view('risk.accident', compact('page'));
});
Route::get('/risk/accident/create', function () {
    return view('risk.create');
});

