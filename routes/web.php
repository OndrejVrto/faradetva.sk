<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;



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
	Route::get('/news/editovat/{slug}', [NewsController::class, 'edit'])->name('news.edit');

	Route::resource('/files', FileController::class, ['only' => 'store', 'update']);
	Route::post('/files/{id}/{model}', [FileController::class, 'create'])->name('files.create');
});


// FrontEnd route
Route::get('/', function () {
	return view('home');
})->name('home');

Route::get('/kontakt', function () {
    return view('contact');
})->name('contact');

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



