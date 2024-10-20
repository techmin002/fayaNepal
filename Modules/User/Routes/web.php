<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UsersController;

Route::group(['middleware' => 'auth'], function () {

    //User Profile
    Route::get('/user/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/user/profile', 'ProfileController@update')->name('profile.update');
    Route::patch('/user/password', 'ProfileController@updatePassword')->name('profile.update.password');

    //Users
    Route::resource('users', 'UsersController')->except('show');
    Route::get('user/status/{id}',[UsersController::class,'status'])->name('user.status');

    //Roles
    Route::resource('roles', 'RolesController')->except('show');

});
