<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Admin_panel_settingsController;
use App\Models\Treasuries;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

define('PAGINATION_COUNT', 5);


Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'auth:admin'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    /* Start Admin_panel_settings */
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('adminpanelsettings/index', [Admin_panel_settingsController::class, 'index'])->name('admin.adminPanelSetting.index');
    Route::get('adminpanelsettings/edit', [Admin_panel_settingsController::class, 'edit'])->name('admin.adminPanelSetting.edit');
    Route::post('adminpanelsettings/update', [Admin_panel_settingsController::class, 'update'])->name('admin.adminPanelSetting.update');
    /* End Admin_panel_settings  */

    /* Start Treasuries */
    Route::get('treasuries/index', [TreasuriesController::class, 'index'])->name('admin.treasuries.index');
    Route::get('treasuries/create', [TreasuriesController::class, 'create'])->name('admin.treasuries.create');
    Route::post('treasuries/store', [TreasuriesController::class, 'store'])->name('admin.treasuries.store');
    Route::get('treasuries/edit/{id}', [TreasuriesController::class, 'edit'])->name('admin.treasuries.edit');
    Route::post('treasuries/update/{id}', [TreasuriesController::class, 'update'])->name('admin.treasuries.update');
    //Route::get('treasuries/test', [TreasuriesController::class, 'test'])->name('admin.treasuries.test');
    /* End Treasuries */
});
///////////////////////
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'guest:admin'
], function () {
    Route::get('login',  [LoginController::class, 'show_login_view'])->name('admin.showlogin');

    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});
