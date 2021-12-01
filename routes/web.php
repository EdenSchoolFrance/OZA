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
Route::get('/503', [AdminController::class, 'unavailable'])->name('unavailable');


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
//Route::get('/bypass/{role}', [AuthController::class, 'bypass'])->name('auth.bypass');

Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.dashboard')->middleware('auth')->middleware('Role');

Route::get('/user', [UsersController::class, 'index'])->name('user.index')->middleware('auth');

Route::get('/work', [WorkUnitController::class, 'index'])->name('work.index')->middleware('auth');
Route::get('/work/create', [WorkUnitController::class, 'create'])->name('work.create')->middleware('auth');
Route::get('/work/create/new', [WorkUnitController::class, 'createNew'])->name('work.create.new')->middleware('auth');

Route::get('/risk/accident', [RiskController::class, 'accident'])->name('risk.accident')->middleware('auth');
Route::get('/risk/accident/create', [RiskController::class, 'accidentCreate'])->name('risk.accident.create')->middleware('auth');

/*
 *
 * Admin OZA section
 *
 * */
Route::middleware([Authenticate::class])->group(function() {
    Route::middleware([Role::class])->group(function () {

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.user');
        Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.client');
        Route::get('/admin/clients/add', [AdminController::class, 'clientsAdd'])->name('admin.client.add');
        Route::post('/admin/clients/add', [AdminController::class, 'clientsAddStore'])->name('admin.client.add');
        Route::get('/admin/clients/du', [AdminController::class, 'clientsDU'])->name('admin.client.du');

    });
});
