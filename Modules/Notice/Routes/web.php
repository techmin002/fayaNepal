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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('notices', NoticeController::class);
    Route::get('notice/status/{id}',[NoticeController::class,'status'])->name('notice.status');
});
