<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\DangerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistorieController;
use App\Http\Controllers\WorkUnitController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestraintController;
use App\Http\Controllers\ExpositionController;

use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Admin\PsychosocialController;
use App\Http\Controllers\Admin\ItemController as ItemAdminController;
use App\Http\Controllers\Admin\RiskController as RiskAdminController;
use App\Http\Controllers\Admin\UserController as UserAdminController;
use App\Http\Controllers\Client\UserController as UserClientController;
use App\Http\Controllers\Admin\ClientController as ClientAdminController;
use App\Http\Controllers\Admin\DangerController as DangerAdminController;
use App\Http\Controllers\Admin\SubItemController as SubItemAdminController;
use App\Http\Controllers\Admin\WorkUnitController as WorkUnitAdminController;
use App\Http\Controllers\Admin\SingleDocumentController as SingleDocumentAdminController;

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
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_store'])->name('login.store');

    Route::get('forget-password', [ForgotPasswordController::class, 'index'])->name('forgetPassword');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('resetPassword');

    Route::post('forget-password', [ForgotPasswordController::class, 'store'])->name('forgetPassword.store');
    Route::post('reset-password/{token}', [ResetPasswordController::class, 'store'])->name('resetPassword.store');
});

Route::middleware(['auth'])->group(function() {

    Route::middleware(['first_auth:true'])->group(function() {
        Route::get('/', [AuthController::class, 'firstAuth'])->name('first_auth');
        Route::post('/', [AuthController::class, 'firstAuth_store'])->name('first_auth.store');
    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::middleware(['first_auth:false'])->group(function() {
        /*===============================
                CLIENT Private Section
        ===============================*/
        Route::middleware(['access:client'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard.home');
        });


        Route::get('/mon-profile/{single_document?}', [ProfileController::class, 'edit'])->name('profile');

        Route::post('/mon-profile/update', [ProfileController::class, 'update'])->name('profile.update');


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
                Route::post('/client/single_document/duplicate', [SingleDocumentAdminController::class, 'duplicate'])->name('admin.single_document.duplicate');


                Route::get('/help/workunit', [WorkUnitAdminController::class, 'index'])->name('admin.help.workunit');
                Route::get('/help/workunit/create', [WorkUnitAdminController::class, 'create'])->name('admin.help.workunit.create');
                Route::get('/help/workunit/{work_unit}/edit', [WorkUnitAdminController::class, 'edit'])->name('admin.help.workunit.edit');

                Route::post('/help/workunit/store', [WorkUnitAdminController::class, 'store'])->name('admin.help.workunit.store');
                Route::post('/help/workunit/{work_unit}/update', [WorkUnitAdminController::class, 'update'])->name('admin.help.workunit.update');
                Route::post('/help/workunit/delete', [WorkUnitAdminController::class, 'delete'])->name('admin.help.workunit.delete');


                Route::get('/help/subitem/edit/{subitem}', [SubItemAdminController::class, 'edit'])->name('admin.help.subitem.edit');

                Route::post('/help/subitem/update/{subitem}', [SubItemAdminController::class, 'update'])->name('admin.help.subitem.update');


                Route::get('/help/item', [ItemAdminController::class, 'index'])->name('admin.help.item');
                Route::get('/help/item/create', [ItemAdminController::class, 'create'])->name('admin.help.item.create');
                Route::get('/help/item/edit', [ItemAdminController::class, 'edit'])->name('admin.help.item.edit');

                Route::post('/help/item/store', [ItemAdminController::class, 'store'])->name('admin.help.item.store');
                Route::post('/help/item/update', [ItemAdminController::class, 'update'])->name('admin.help.item.update');
                Route::post('/help/item/delete', [ItemAdminController::class, 'delete'])->name('admin.help.item.delete');


                Route::get('/help/danger', [DangerAdminController::class, 'index'])->name('admin.help.danger');
                //Route::get('/help/danger/create', [DangerAdminController::class, 'create'])->name('admin.help.danger.create');
                Route::get('/help/danger/{danger}/edit', [DangerAdminController::class, 'edit'])->name('admin.help.danger.edit');

                //Route::post('/help/danger/store', [DangerAdminController::class, 'store'])->name('admin.help.danger.store');
                Route::post('/help/danger/{danger}/update', [DangerAdminController::class, 'update'])->name('admin.help.danger.update');
                // Route::post('/help/danger/delete', [DangerAdminController::class, 'delete'])->name('admin.help.danger.delete');


                Route::get('/help/risk', [RiskAdminController::class, 'index'])->name('admin.help.risk');
                Route::get('/help/risk/create', [RiskAdminController::class, 'create'])->name('admin.help.risk.create');
                Route::get('/help/risk/{risk}/edit', [RiskAdminController::class, 'edit'])->name('admin.help.risk.edit');

                Route::post('/help/risk/store', [RiskAdminController::class, 'store'])->name('admin.help.risk.store');
                Route::post('/help/risk/{risk}/update', [RiskAdminController::class, 'update'])->name('admin.help.risk.update');
                Route::post('/help/risk/delete', [RiskAdminController::class, 'delete'])->name('admin.help.risk.delete');


                Route::get('/{doc_name}/edit', [DocController::class, 'edit'])->name('documentation.edit');

                Route::post('/{doc_name}/update', [DocController::class, 'update'])->name('documentation.update');
                Route::post('/{doc_name}/file/upload', [DocController::class, 'upload'])->name('documentation.upload');
                Route::post('/{doc_name}/file/delete', [DocController::class, 'delete'])->name('documentation.delete');

                Route::get('/doc/{doc_name}/file/download/{file_name}', [DocController::class, 'download'])->name('documentation.download');
            });

            /*================ ADMIN | EXPERT ================*/
            Route::middleware(['permission:ADMIN,EXPERT'])->group(function () {
                Route::get('/clients', [ClientAdminController::class, 'index'])->name('admin.clients');
                Route::get('/client/{client}/edit', [ClientAdminController::class, 'edit'])->name('admin.client.edit');

                Route::post('/client/{client}/update', [ClientAdminController::class, 'update'])->name('admin.client.update');


                Route::get('/clients/single_documents', [SingleDocumentAdminController::class, 'index'])->name('admin.single_documents');
                Route::get('/client/{client}/single_document/{single_document}/edit', [SingleDocumentAdminController::class, 'edit'])->name('admin.single_document.edit');

                Route::post('/client/{client}/single_document/{single_document}/update', [SingleDocumentAdminController::class, 'update'])->name('admin.single_document.update');

                Route::post('/{single_document}/{psychosocial_group}/evaluation', [PsychosocialController::class, 'evaluation_store'])->name('risk_psycho.evaluation.store');
            });
        });


        /*===============================
                CLIENT Section
        ===============================*/
        Route::get('/{single_document}/dashboard/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/{single_document}/presentation', [PresentationController::class, 'index'])->name('presentation');
        Route::post('/{single_document}/presentation/{type}', [PresentationController::class, 'update'])->name('presentation.update');

        Route::middleware(['permission:ADMIN,EXPERT'])->group(function () {
            Route::post('/{single_document}/history/delete', [HistorieController::class, 'delete'])->name('history.delete');
        });

        Route::middleware(['permission:ADMIN,EXPERT,MANAGER'])->group(function () {
            Route::get('/{single_document}/users', [UserClientController::class, 'index'])->name('user.client.index');
            Route::get('/{single_document}/user/create', [UserClientController::class, 'create'])->name('user.client.create');
            Route::get('/{single_document}/user/{user}/edit', [UserClientController::class, 'edit'])->name('user.client.edit');

            Route::post('/{single_document}/user/store', [UserClientController::class, 'store'])->name('user.client.store');
            Route::post('/{single_document}/user/{user}/update', [UserClientController::class, 'update'])->name('user.client.update');
            Route::post('/{single_document}/user/delete', [UserClientController::class, 'delete'])->name('user.client.delete');
        });

        Route::get('/{single_document}/work', [WorkUnitController::class, 'index'])->name('work.index');

        Route::middleware(['permission:ADMIN,EXPERT,MANAGER,EDITOR'])->group(function () {
            Route::get('/{single_document}/work/create/{work_unit?}', [WorkUnitController::class, 'create'])->name('work.create');
            Route::get('/{single_document}/work/edit/{id_work}', [WorkUnitController::class, 'edit'])->name('work.edit');

            Route::post('/{single_document}/work/store', [WorkUnitController::class, 'store'])->name('work.store');
            Route::post('/{single_document}/work/update/{work_unit}', [WorkUnitController::class, 'update'])->name('work.update');
            Route::post('/{single_document}/work/delete', [WorkUnitController::class, 'delete'])->name('work.delete');
        });

        Route::get('/{single_document}/danger/{danger}', [DangerController::class, 'index'])->name('danger.index');

        Route::middleware(['permission:ADMIN,EXPERT,MANAGER,EDITOR'])->group(function () {
            Route::post('/{single_document}/danger/{danger}/store', [DangerController::class, 'store'])->name('danger.store');
            Route::post('/{single_document}/danger/{danger}/work/{work_unit}/exist', [DangerController::class, 'work_unit_exist'])->name('danger.work_unit.exist');
            Route::post('/{single_document}/danger/{danger}/work/{work_unit}/exposition/{exposition}/exist', [DangerController::class, 'exposition_exist'])->name('danger.exposition.exist');

            Route::post('/{single_document}/danger/{danger}/work/{work_unit}/exposition/{exposition}/', [ExpositionController::class, 'store'])->name('exposition.store');

            Route::get('/{single_document}/danger/{danger}/create/{sd_work_unit}/{risk?}', [RiskController::class, 'create'])->name('risk.create');
            Route::get('/{single_document}/danger/{danger}/edit/{risk}', [RiskController::class, 'edit'])->name('risk.edit');

            Route::post('/{single_document}/danger/{danger}/store/{sd_work_unit}', [RiskController::class, 'store'])->name('risk.store');
            Route::post('/{single_document}/danger/{danger}/update/{sd_work_unit}/{risk}', [RiskController::class, 'update'])->name('risk.update');
            Route::post('/{single_document}/danger/{danger}/delete', [RiskController::class, 'delete'])->name('risk.delete');
            Route::post('/{single_document}/danger/{danger}/duplicate', [RiskController::class, 'duplicate'])->name('risk.duplicate');

            Route::get('/{single_document}/risk/all', [RiskController::class, 'all'])->name('risk.all');
        });

        Route::get('/{single_document}/restraint/', [RestraintController::class, 'index'])->name('restraint.index');
        Route::get('/{single_document}/restraint/archived', [RestraintController::class, 'archived'])->name('restraint.archived');



        Route::middleware(['permission:ADMIN,EXPERT,MANAGER,EDITOR'])->group(function () {
            Route::post('/{single_document}/restraint/store/', [RestraintController::class, 'store'])->name('restraint.store');
        });

        Route::get('/{single_document}/risk/post', [RiskController::class, 'post'])->name('risk.post');

        Route::middleware(['access:oza'])->group(function () {
            Route::post('/{single_document}/work/create/filter', [WorkUnitController::class, 'filter'])->name('work.filter');

            Route::post('/{single_document}/danger/{danger}/create/filter', [RiskController::class, 'filter'])->name('risk.filter');
            Route::post('/{single_document}/danger/{danger}/comment', [DangerController::class, 'comment'])->name('danger.comment');
        });

        Route::get('/{single_document}/{psychosocial_group}/evaluation', [PsychosocialController::class, 'evaluation'])->name('risk_psycho.evaluation');

        Route::get('/{single_document}/pdf', [PDFController::class, 'viewpdf'])->name('pdf.view');
        Route::get('/{single_document}/pdf/download', [PDFController::class, 'create'])->name('pdf.download');

        Route::post('/{single_document}/history/store', [HistorieController::class, 'store'])->name('history.store');
        Route::get('/{single_document}/history/download/{id}', [HistorieController::class, 'download'])->name('history.download');

        Route::get('/{single_document}/{doc_name?}', [DocController::class, 'index'])->name('documentation');

    });
});
