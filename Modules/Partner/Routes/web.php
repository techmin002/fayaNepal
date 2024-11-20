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

use Modules\Partner\Http\Controllers\PartnerController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('partners', 'PartnerController');
    Route::get('partner/status/{id}',[PartnerController::class,'status'])->name('partner.status');
});