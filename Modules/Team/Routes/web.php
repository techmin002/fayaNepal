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

use Illuminate\Support\Facades\Route;
use Modules\Team\Http\Controllers\TeamController;
use Modules\Team\Http\Controllers\LeadershipController;
use Modules\Team\Http\Controllers\PublicationController;
use Modules\Team\Http\Controllers\ReportController;


Route::group(['middleware' => 'auth'], function () {
    Route::resource('teams', 'TeamController');
    Route::resource('leaderships', 'LeadershipController');
    Route::resource('publications', 'PublicationController');
    Route::resource('reports', 'ReportController');
    Route::get('leadership/status/{id}',[LeadershipController::class,'status'])->name('leadership.status');
    Route::get('leadership/status/{id}',[LeadershipController::class,'status'])->name('leadership.status');
    Route::get('publication/status/{id}',[PublicationController::class,'status'])->name('publication.status');
    Route::get('report/status/{id}',[ReportController::class,'status'])->name('report.status');


});
