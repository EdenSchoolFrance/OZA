<?php

use App\Http\Controllers\DangerController;
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
    Route::middleware(['access:client'])->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
    });


    /*===============================
                OZA Section
    ===============================*/
    Route::middleware(['access:oza'])->group(function () {

        /*================ ADMIN ================*/
        Route::middleware(['permission:ADMIN'])->group(function () {
            Route::get('/users', [UserAdminController::class, 'index'])->name('admin.users');
            Route::get('/user/create', [UserAdminController::class, 'create'])->name('admin.user.create');
            Route::get('/user/{user}/edit', [UserAdminController::class, 'edit'])->name('admin.user.edit');

            Route::post('/user/store', [UserAdminController::class, 'store'])->name('admin.user.store');
            Route::post('/user/{user}/update', [UserAdminController::class, 'update'])->name('admin.user.update');
            Route::post('/user/delete', [UserAdminController::class, 'delete'])->name('admin.user.delete');


            Route::get('/client/create', [ClientAdminController::class, 'create'])->name('admin.client.create');

            Route::post('/client/store', [ClientAdminController::class, 'store'])->name('admin.client.store');
            Route::post('/client/archive', [ClientAdminController::class, 'archive'])->name('admin.client.archive');
            Route::post('/client/unarchive', [ClientAdminController::class, 'unarchive'])->name('admin.client.unarchive');
            Route::post('/client/{client}/delete', [ClientAdminController::class, 'delete'])->name('admin.client.delete');

            Route::post('/client/{client}/single_document/store', [SingleDocumentAdminController::class, 'store'])->name('admin.single_document.store');
            Route::post('/single_document/archive', [SingleDocumentAdminController::class, 'archive'])->name('admin.single_document.archive');
            Route::post('/single_document/unarchive', [SingleDocumentAdminController::class, 'unarchive'])->name('admin.single_document.unarchive');
            Route::post('/client/{client}/single_document/{single_document}/delete', [SingleDocumentAdminController::class, 'delete'])->name('admin.single_document.delete');


            Route::get('/{doc_name}/edit', [DocController::class, 'edit'])->name('documentation.edit');

            Route::post('/{doc_name}/update', [DocController::class, 'update'])->name('documentation.update');
            Route::post('/doc/upload', [DocController::class, 'upload'])->name('documentation.upload');
        });

        /*================ ADMIN | EXPERT ================*/
        Route::middleware(['permission:ADMIN,EXPERT'])->group(function () {
            Route::get('/clients', [ClientAdminController::class, 'index'])->name('admin.clients');
            Route::get('/client/{client}/edit', [ClientAdminController::class, 'edit'])->name('admin.client.edit');

            Route::post('/client/{client}/update', [ClientAdminController::class, 'update'])->name('admin.client.update');


            Route::get('/clients/single_documents', [SingleDocumentAdminController::class, 'index'])->name('admin.single_documents');
            Route::get('/client/{client}/single_document/{single_document}/edit', [SingleDocumentAdminController::class, 'edit'])->name('admin.single_document.edit');

            Route::post('/client/{client}/single_document/{single_document}/update', [SingleDocumentAdminController::class, 'update'])->name('admin.single_document.update');
        });
    });


    Route::get('/{doc_name}', [DocController::class, 'index'])->name('documentation');


    /*===============================
              CLIENT Section
    ===============================*/
    Route::get('/{single_document}/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/{single_document}/presentation', [PresentationController::class, 'index'])->name('presentation');
    Route::post('/{single_document}/presentation/{type}', [PresentationController::class, 'update'])->name('presentation.update');

    Route::middleware(['permission:ADMIN,EXPERT,MANAGER'])->group(function () {
        Route::get('/{single_document}/user', [UserClientController::class, 'index'])->name('user.client.index');
        Route::get('/{single_document}/user/create', [UserClientController::class, 'create'])->name('user.client.create');
        Route::get('/{single_document}/user/{user}/edit', [UserClientController::class, 'edit'])->name('user.client.edit');

        Route::post('/{single_document}/user/store', [UserClientController::class, 'store'])->name('user.client.store');
        Route::post('/{single_document}/user/{user}/update', [UserClientController::class, 'update'])->name('user.client.update');
        Route::post('/{single_document}/user/delete', [UserClientController::class, 'delete'])->name('user.client.delete');
    });

    Route::get('/{single_document}/work', [WorkUnitController::class, 'index'])->name('work.index');
    Route::get('/{single_document}/work/create/{work_unit?}', [WorkUnitController::class, 'create'])->name('work.create');
    Route::get('/{single_document}/work/edit/{id_work}', [WorkUnitController::class, 'edit'])->name('work.edit');

    Route::post('/{single_document}/work/create/filter', [WorkUnitController::class, 'filter'])->name('work.filter');
    Route::post('/{single_document}/work/store', [WorkUnitController::class, 'store'])->name('work.store');
    Route::post('/{single_document}/work/update/{work_unit}', [WorkUnitController::class, 'update'])->name('work.update');
    Route::post('/{single_document}/work/delete', [WorkUnitController::class, 'delete'])->name('work.delete'); // change post

    Route::get('/{single_document}/danger/{danger}', [DangerController::class, 'index'])->name('danger.index');

    Route::post('/{single_document}/danger/{danger}/store', [DangerController::class, 'store'])->name('danger.store');
    Route::post('/{single_document}/danger/{danger}/validated/{work_unit}', [DangerController::class, 'validated'])->name('danger.validated');
    Route::post('/{single_document}/danger/{danger}/comment', [DangerController::class, 'comment'])->name('danger.comment');

    Route::get('/{single_document}/danger/{danger}/create/{sd_work_unit}/{risk?}', [RiskController::class, 'create'])->name('risk.create');
    Route::get('/{single_document}/danger/{danger}/edit/{risk}', [RiskController::class, 'edit'])->name('risk.edit');

    Route::post('/{single_document}/danger/{danger}/create/filter', [RiskController::class, 'filter'])->name('risk.filter');
    Route::post('/{single_document}/danger/{danger}/store/{sd_work_unit}', [RiskController::class, 'store'])->name('risk.store');
    Route::post('/{single_document}/danger/{danger}/update/{sd_work_unit}/{risk}', [RiskController::class, 'update'])->name('risk.update');
    Route::post('/{single_document}/danger/{danger}/delete/{risk}', [RiskController::class, 'delete'])->name('risk.delete');

});
