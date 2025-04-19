<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\BankAccountController;
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
Route::get('current-project', [FrontendController::class,'currentPrograms'])->name('frontend.currentproject');
Route::get('past-project', [FrontendController::class,'pastPrograms'])->name('frontend.pastproject');

Route::get('past-events', [FrontendController::class,'events'])->name('frontend.events');
Route::get('/fn-gallery', [FrontendController::class,'gallery'])->name('frontend.gallery');
// Route::get('/volunteers', [FrontendController::class,'volunteers'])->name('frontend.volunteers');
Route::get('/fn-blogs', [FrontendController::class,'blogs'])->name('frontend.blogs');
Route::get('blog/{slug}', [FrontendController::class,'blogDetail'])->name('blog.detail');
Route::get('program/{slug}', [FrontendController::class,'programDetail'])->name('program.detail');
Route::get('event/{id}', [FrontendController::class,'eventDetail'])->name('event.detail');
Route::get('story-detail/{id}', [FrontendController::class,'storyDetail'])->name('story.detail');
Route::get('/partners-donors', [FrontendController::class,'partnersDonors'])->name('frontend.partnersdonors');
Route::get('/coverage', [FrontendController::class,'coverage'])->name('frontend.coverage');
Route::get('/noticeboard', [FrontendController::class,'noticeboard'])->name('frontend.noticeboard');
Route::get('/vollunter', [FrontendController::class,'vollunter'])->name('frontend.vollunter');
Route::get('/fn-stories', [FrontendController::class,'stories'])->name('frontend.stories');
Route::get('/fn-sector/{slug}', [FrontendController::class,'works'])->name('frontend.works');

Route::get('/contact', [FrontendController::class,'contact'])->name('frontend.contact');
Route::get('/leadership', [FrontendController::class,'leadership'])->name('frontend.leadership');
Route::get('/publication', [FrontendController::class,'publication'])->name('frontend.publication');
Route::get('/annual-report', [FrontendController::class,'annualReport'])->name('frontend.annual');
Route::get('/project-report', [FrontendController::class,'projectReport'])->name('frontend.project');
Route::get('/fn-procurement', [FrontendController::class,'procurement'])->name('frontend.procurement');
Route::get('/fn-organogram', [FrontendController::class,'organogram'])->name('frontend.organogram');
Route::get('/fn-vacancies', [FrontendController::class,'vacancy'])->name('frontend.vacancies');
Route::get('/become-volunteer', [FrontendController::class,'becomeVolunteer'])->name('become.volunteer');
Route::post('store/become-volunteer', [FrontendController::class,'storeVolunteer'])->name('volunteer.store');

Route::get('/executive-board', [FrontendController::class,'executiveBoard'])->name('frontend.executiveBoard');
Route::get('/donate', [FrontendController::class,'donate'])->name('frontend.donate');
Route::post('/donate', [FrontendController::class,'donateStore'])->name('donate.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('contact/store',[InquiryController::class,'store'])->name('frontend.contact.store');
Route::get('inquiries',[InquiryController::class,'index'])->name('inquires.index');
Route::delete('inquiries/delete/{id}',[InquiryController::class,'destroy'])->name('inquires.destroy');
Route::get('/fetch-notice', [FrontendController::class, 'fetchNotice'])->name('fetch.notice');
// routes/web.php

// Route::get('/feed', [\App\Http\Controllers\FacebookFeedController::class, 'showFeed']);
// Route::view('/feed', 'feed');

