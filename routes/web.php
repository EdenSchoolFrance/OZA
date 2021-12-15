<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\UserController as UserClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresentationController;

use App\Http\Controllers\Admin\UserController as UserAdminController;
use App\Http\Controllers\Admin\ClientController as ClientAdminController;
use App\Http\Controllers\Admin\SingleDocumentController as SingleDocumentAdminController;

use App\Http\Controllers\RiskController;
use App\Http\Controllers\WorkUnitController;

use App\Http\Controllers\DocController;

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

    /*===============================
            CLIENT Private Section
    ===============================*/
    Route::middleware(['permission:client'])->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');

    });


    /*===============================
            OZA Section
    ===============================*/

    /*================ ADMIN | EXPERT ================*/
    Route::middleware(['permission:oza,ADMIN,EXPERT'])->group(function () {
        Route::get('/users', [UserAdminController::class, 'index'])->name('admin.user');

        Route::get('/client', [ClientAdminController::class, 'index'])->name('admin.client');
        Route::get('/client/create', [ClientAdminController::class, 'create'])->name('admin.client.create');
        Route::get('/client/{client}/edit', [ClientAdminController::class, 'edit'])->name('admin.client.edit');

        Route::post('/client/store', [ClientAdminController::class, 'store'])->name('admin.client.store');
        Route::post('/client/{client}/update', [ClientAdminController::class, 'update'])->name('admin.client.update');

        Route::get('/clients/du', [SingleDocumentAdminController::class, 'index'])->name('admin.client.single_document');
    });


    /*================ ADMIN ================*/
    Route::middleware(['permission:oza,ADMIN'])->group(function () {
        Route::get('/users/create', [UserAdminController::class, 'create'])->name('admin.user.create');
        Route::get('/users/{user}/edit', [UserAdminController::class, 'edit'])->name('admin.user.edit');

        Route::post('/users/store', [UserAdminController::class, 'store'])->name('admin.user.store');
        Route::post('/users/{user}/update', [UserAdminController::class, 'update'])->name('admin.user.update');


        Route::post('/client/{client}/single_document/store', [SingleDocumentAdminController::class, 'store'])->name('admin.single_document.store');
    });


    Route::get('/{doc_name}', [DocController::class, 'index'])->name('documentation');

    Route::middleware(['permission:oza,ADMIN'])->group(function () {
        Route::get('/{doc_name}/edit', [DocController::class, 'edit'])->name('documentation.edit');

        Route::post('/{doc_name}/update', [DocController::class, 'update'])->name('documentation.update');
        Route::post('/doc/upload', [DocController::class, 'upload'])->name('documentation.upload');
    });


    /*===============================
            CLIENT Section
    ===============================*/

    Route::get('/{single_document}/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/{single_document}/presentation', [PresentationController::class, 'index'])->name('presentation');
    Route::post('/{single_document}/presentation/{type}', [PresentationController::class, 'store'])->name('presentation.store');

    Route::get('/{single_document}/user', [UserClientController::class, 'index'])->name('user.client.index');

    Route::get('/{single_document}/work', [WorkUnitController::class, 'index'])->name('work.index');
    Route::get('/{single_document}/work/create', [WorkUnitController::class, 'create'])->name('work.create');
    Route::get('/{single_document}/work/create/new', [WorkUnitController::class, 'createNew'])->name('work.create.new');

    Route::get('/{single_document}/risk/accident', [RiskController::class, 'accident'])->name('risk.accident');
    Route::get('/{single_document}/risk/accident/create', [RiskController::class, 'accidentCreate'])->name('risk.accident.create');
});