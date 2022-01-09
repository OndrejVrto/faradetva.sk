<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\StaticPagesController;

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

// Auth::routes();  //Orginal routes for Authorisation
/** Login Routes */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
/**  Logout Route */
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/** Frontend Routes */
Route::get('/', [StaticPagesController::class, 'home'] )->name('home');
Route::get('/frantisek', [StaticPagesController::class, 'francisco'] )->name('static.francisco');
Route::get('/kontakt', [StaticPagesController::class, 'contact'] )->name('static.contact');
/** News atricle */
Route::get('/clanky', [ArticleController::class, 'index'])->name('article.index');
Route::get('/clanok/{slug}', [ArticleController::class, 'show'])->name('article.show');
/** Search routes */
Route::get('/search/{search?}', [SearchController::class, 'search'] )->name('search');

/** BackEnd Routes */
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function()
{
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('news', NewsController::class, ['except' => 'show']);
    Route::resource('tags', TagController::class, ['except' => 'show']);
    Route::resource('categories', CategoryController::class, ['except' => 'show']);

    Route::resource('priests', PriestController::class, ['except' => 'show']);
    Route::resource('testimonials', TestimonialController::class, ['except' => 'show']);
    Route::resource('sliders', SliderController::class, ['except' => 'show']);
    Route::resource('banners', BannerController::class, ['except' => 'show']);

    Route::resource('users', UsersController::class);
    Route::resource('roles', RolesController::class, ['except' => 'show']);
    Route::resource('permissions', PermissionsController::class, ['except' => 'show']);
});

// only for Debug
Route::view('419', 'errors.419');
Route::view('403', 'errors.403');
Route::view('404', 'errors.404');
Route::view('500', 'errors.500');
