<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WorkUnitController;
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
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/bypass/{role}', [AuthController::class, 'bypass'])->name('auth.bypass');

Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.dashboard');

Route::get('/user', [UsersController::class, 'index'])->name('user.index');

Route::get('/work', [WorkUnitController::class, 'index'])->name('work.index');
Route::get('/work/create', [WorkUnitController::class, 'create'])->name('work.create');
Route::get('/work/create/new', [WorkUnitController::class, 'createNew'])->name('work.create.new');

Route::get('/risk/accident', [RiskController::class, 'accident'])->name('risk.accident');
Route::get('/risk/accident/create', [RiskController::class, 'accidentCreate'])->name('risk.accident.create');

/*
 *
 * Admin OZA section
 *
 * */
Route::get('/admin/users', function () {
    $page = [
        'title' => 'Liste des utilisateurs',
        'sidebar' => 'users',
        'sub_sidebar' => 'listUser',
        'oza' => true,
        'nav' => 'oza'
    ];

    return view('admin.users.index', compact('page'));
});

Route::get('/admin/clients', function () {
    $page = [
        'title' => 'Liste des utilisateurs',
        'sidebar' => 'clients',
        'sub_sidebar' => 'listClient',
        'oza' => true,
        'nav' => 'oza'
    ];

    return view('admin.client.index', compact('page'));
});

Route::get('/admin/clients/add', function () {

    $page = [
        'title' => 'Ajouter un client',
        'sidebar' => 'clients',
        'sub_sidebar' => 'addClient',
        'oza' => true,
        'nav' => 'oza'
    ];

    return view('admin.client.add', compact('page'));
});

Route::get('/admin/clients/du', function () {

    $page = [
        'title' => 'Liste des DU',
        'sidebar' => 'clients',
        'sub_sidebar' => 'listDu',
        'oza' => true,
        'nav' => 'oza'
    ];

    return view('admin.client.listDu', compact('page'));
});
