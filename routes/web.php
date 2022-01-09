<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\StaticPagesController;

/** Login Routes */
// Auth::routes();  // All routes for Authorisation
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
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('news', NewsController::class, ['except' => 'show']);
    Route::resource('tags', TagController::class, ['except' => 'show']);
    Route::resource('categories', CategoryController::class, ['except' => 'show']);

    Route::resource('priests', PriestController::class, ['except' => 'show']);
    Route::resource('testimonials', TestimonialController::class, ['except' => 'show']);
    Route::resource('sliders', SliderController::class, ['except' => 'show']);
    Route::resource('banners', BannerController::class, ['except' => 'show']);

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class, ['except' => 'show']);
    Route::resource('permissions', PermissionController::class, ['except' => 'show']);
});

// only for Debug
Route::view('419', 'errors.419');
Route::view('403', 'errors.403');
Route::view('404', 'errors.404');
Route::view('500', 'errors.500');
