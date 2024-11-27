<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class,'about'])->name('frontend.about');
Route::get('fn-Programs', [FrontendController::class,'programs'])->name('frontend.ourprograms');
Route::get('fn-events', [FrontendController::class,'events'])->name('frontend.events');
Route::get('/fn-gallery', [FrontendController::class,'gallery'])->name('frontend.gallery');
// Route::get('/volunteers', [FrontendController::class,'volunteers'])->name('frontend.volunteers');
Route::get('/fn-blogs', [FrontendController::class,'blogs'])->name('frontend.blogs');
Route::get('blog/{slug}', [FrontendController::class,'blogDetail'])->name('blog.detail');
Route::get('program/{slug}', [FrontendController::class,'programDetail'])->name('program.detail');
Route::get('event/{id}', [FrontendController::class,'eventDetail'])->name('event.detail');
Route::get('story-detail/{id}', [FrontendController::class,'storyDetail'])->name('story.detail');


Route::get('/contact', [FrontendController::class,'contact'])->name('frontend.contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('contact/store',[InquiryController::class,'store'])->name('frontend.contact.store');
Route::get('inquiries',[InquiryController::class,'index'])->name('inquires.index');
Route::delete('inquiries/delete/{id}',[InquiryController::class,'destroy'])->name('inquires.destroy');
Route::get('/fetch-notice', [FrontendController::class, 'fetchNotice'])->name('fetch.notice');