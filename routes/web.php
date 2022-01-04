<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\StaticPagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\Frontend\ArticleController;


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

/** Frontend Routes */
Route::get('/', [StaticPagesController::class, 'home'] )->name('home');
Route::get('/frantisek', [StaticPagesController::class, 'francisco'] )->name('static.francisco');
Route::get('/kontakt', [StaticPagesController::class, 'contact'] )->name('static.contact');
/** News atricle */
Route::get('/clanky', [ArticleController::class, 'index'])->name('article.index');
Route::get('/clanok/{slug}', [ArticleController::class, 'show'])->name('article.show');
/** Search routes */
Route::get('/search/{search?}', [SearchController::class, 'search'] )->name('search');



Auth::routes();
/** Logins Routes */
Route::group(['middleware' => 'guest'], function()
{
	/** Login Routes */
	// Route::get('/login', [LoginController::class, 'show'])->name('login.show');
	// Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

	/** Register Routes */
	// Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
	// Route::post('/register', [RegisterController::class,'register'])->name('register.perform');
});
Route::group(['middleware' => 'auth'], function()
{
	/**  Logout Routes */
	// Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});


/** BackEnd Routes */
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {

	Route::resource('users', UsersController::class);
	Route::resource('roles', RolesController::class);
	Route::resource('permissions', PermissionsController::class);

	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
	Route::resource('tags', TagController::class, ['except' => 'show']);
	Route::resource('categories', CategoryController::class, ['except' => 'show']);
	Route::resource('news', NewsController::class, ['except' => 'show']);
	Route::resource('priests', PriestController::class, ['except' => 'show']);
	Route::resource('testimonials', TestimonialController::class, ['except' => 'show']);
	Route::resource('sliders', SliderController::class, ['except' => 'show']);
	Route::resource('banners', BannerController::class, ['except' => 'show']);
});

