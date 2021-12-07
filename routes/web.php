<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\UserController as UserClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresentationController;

use App\Http\Controllers\Admin\UserController as UserAdminController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\WorkUnitController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home')->middleware('permission:client');

    /*
     *
     * Admin OZA section
     *
     * */
    Route::middleware(['permission:oza,SUPER_ADMIN,ADMIN'])->group(function () {
        Route::get('/users', [UserAdminController::class, 'index'])->name('admin.user');
        
        Route::get('/clients', [AdminController::class, 'clients'])->name('admin.client');
        Route::get('/clients/add', [AdminController::class, 'clientsAdd'])->name('admin.client.add');
        Route::post('/clients/add', [AdminController::class, 'clientsAddStore'])->name('admin.client.add.store');
        Route::get('/clients/du', [AdminController::class, 'clientsDU'])->name('admin.client.du');
    });

    Route::get('/{id}/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/{id}/presentation', [PresentationController::class, 'index'])->name('presentation');
    Route::post('/{id}/presentation/{type}', [PresentationController::class, 'store'])->name('presentation.store');

    Route::get('/{id}/user', [UserClientController::class, 'index'])->name('user.client.index');

    Route::get('/{id}/work', [WorkUnitController::class, 'index'])->name('work.index');
    Route::get('/{id}/work/create', [WorkUnitController::class, 'create'])->name('work.create');
    Route::get('/{id}/work/create/new', [WorkUnitController::class, 'createNew'])->name('work.create.new');

    Route::get('/{id}/risk/accident', [RiskController::class, 'accident'])->name('risk.accident');
    Route::get('/{id}/risk/accident/create', [RiskController::class, 'accidentCreate'])->name('risk.accident.create');
});