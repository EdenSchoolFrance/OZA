<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;

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



Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware([Authenticate::class])->group(function() {
    Route::get('/503', [AdminController::class, 'unavailable'])->name('unavailable');

    Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
    Route::get('/du/{id}/dashboard/', [DashboardController::class, 'index'])->name('dashboard.dashboard');
    Route::post('/du/{id}/dashboard/info-gen', [DashboardController::class, 'storeInfo'])->name('dashboard.store.info-gen');
    Route::post('/du/{id}/dashboard/desc', [DashboardController::class, 'storeDesc'])->name('dashboard.store.desc');
    Route::post('/du/{id}/dashboard/resp', [DashboardController::class, 'storeResp'])->name('dashboard.store.resp');

    Route::get('/du/{id}/user', [UsersController::class, 'index'])->name('user.index');

    Route::get('/du/{id}/work', [WorkUnitController::class, 'index'])->name('work.index');
    Route::get('/du/{id}/work/create', [WorkUnitController::class, 'create'])->name('work.create');
    Route::get('/du/{id}/work/create/new', [WorkUnitController::class, 'createNew'])->name('work.create.new');

    Route::get('/du/{id}/risk/accident', [RiskController::class, 'accident'])->name('risk.accident');
    Route::get('/du/{id}/risk/accident/create', [RiskController::class, 'accidentCreate'])->name('risk.accident.create');

    /*
     *
     * Admin OZA section
     *
     * */

    Route::middleware([Role::class])->group(function () {

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.user');
        Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.client');
        Route::get('/admin/clients/add', [AdminController::class, 'clientsAdd'])->name('admin.client.add');
        Route::post('/admin/clients/add', [AdminController::class, 'clientsAddStore'])->name('admin.client.add.store');
        Route::get('/admin/clients/du', [AdminController::class, 'clientsDU'])->name('admin.client.du');

    });
});
