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
use Modules\Partner\Http\Controllers\DonorController;
Route::group(['middleware' => 'auth'], function () {
    Route::resource('partners', 'PartnerController');
    Route::get('partner/status/{id}',[PartnerController::class,'status'])->name('partner.status');
    Route::resource('donors', DonorController::class);
Route::get('donors/{id}/status', [DonorController::class, 'status'])
    ->name('donors.status');
    Route::get('/partnersdonors', [PartnerController::class, 'partnersWithDonors'])->name('partners.donors');
});
