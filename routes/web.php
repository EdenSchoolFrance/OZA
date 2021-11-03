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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/work', function () {
    return view('dashboard.work');
});
Route::get('/work/create/', function () {
    return view('dashboard.create');
});
Route::get('/work/create/new', function () {
    return view('dashboard.createNew');
});
Route::get('/risk/accident', function () {
    return view('risk.accident');
});
Route::get('/risk/accident/create', function () {
    return view('risk.create');
});

