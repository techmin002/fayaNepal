<?php

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

use Modules\Notice\Http\Controllers\NoticeController;
use Modules\Notice\Http\Controllers\ProcurementController;
use Modules\Notice\Http\Controllers\OrganogramController;


Route::group(['middleware' => 'auth'], function () {
    Route::resource('notices', NoticeController::class);
    Route::get('notice/status/{id}',[NoticeController::class,'status'])->name('notice.status');
    Route::resource('procurements', ProcurementController::class);
    Route::get('procurement/status/{id}',[ProcurementController::class,'status'])->name('procurement.status');
    Route::resource('organograms', OrganogramController::class);
    Route::get('organogram/status/{id}',[OrganogramController::class,'status'])->name('organogram.status');
});
