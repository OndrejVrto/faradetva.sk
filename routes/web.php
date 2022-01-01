<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PriestController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Debug\DebugController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\ContactController;

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

// BackEnd route
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->group(function () {

	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

	Route::resource('/tags', TagController::class, ['except' => 'show', 'edit']);
	Route::get('/tags/editovat/{slug}', [TagController::class, 'edit'])->name('tags.edit');

	Route::resource('/categories', CategoryController::class, ['except' => 'show', 'edit']);
	Route::get('/categories/editovat/{slug}', [CategoryController::class, 'edit'])->name('categories.edit');

	Route::resource('/news', NewsController::class, ['except' => 'show', 'edit']);
	Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
	Route::get('/news/editovat/{slug}', [NewsController::class, 'edit'])->name('news.edit');

	Route::resource('/priests', PriestController::class);

	Route::resource('/testimonials', TestimonialController::class);

	Route::resource('/sliders', SliderController::class);


});


// only bebug
Route::get('/all-sections', [DebugController::class, 'index'] )->name('debug.all');



// FrontEnd route
Route::get('/kontakt', [ContactController::class, 'index'] )->name('contact');





Route::get('/', function () {

	return redirect()->route('debug.all');  //for debuging
	// return view('home');
})->name('home');


Route::get('/spolocenstva', function () {
    return view('ministries');
})->name('ministries');

Route::get('/udalosti', function () {
    return view('events');
})->name('events');

Route::get('/o-nas', function () {
    return view('about-us');
})->name('about-us');

Route::get('/spravy', function () {
    return view('news');
})->name('news');

Route::get('/sprava/{id?}', function ($id = 1) {
    return view('one-news', ['id'=> $id]);
})->name('one-news')->where('id', '[0-9]+');



