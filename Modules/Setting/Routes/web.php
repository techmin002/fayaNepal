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
use Modules\Setting\Http\Controllers\CompanyProfileController;
use Modules\Setting\Http\Controllers\BankAccountController;

Route::prefix('setting')->group(function() {
    Route::get('/', 'SettingController@index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('company','CompanyProfileController');
    Route::resource('bank-accounts','BankAccountController');
    Route::get('bank-account/status/{id}',[BankAccountController::class,'status'])->name('bank-account.status');
    Route::get('donation/status/{id}',[BankAccountController::class,'Donationstatus'])->name('donation.status');
    Route::get('donations/list',[BankAccountController::class,'donations'])->name('donations.index');
    Route::get('why/us',[CompanyProfileController::class,'whyUs'])->name('whyus.index');
    Route::post('whyus/store',[CompanyProfileController::class,'WhyUsStore'])->name('whyus.store');
    Route::put('whyus/update/{id}',[CompanyProfileController::class,'WhyUsUpdate'])->name('whyus.update');
    Route::get('whyus/delete/{id}',[CompanyProfileController::class,'WhyUsDelete'])->name('whyus.delete');
});
