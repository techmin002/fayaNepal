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
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Controllers\EventController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('blogs', 'BlogController');
    Route::resource('events', 'EventController');
    Route::get('blog/status/{id}',[BlogController::class,'status'])->name('blog.status');
    Route::get('event/status/{id}',[EventController::class,'status'])->name('event.status');
});

