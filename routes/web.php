<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FileTypeController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\Backend\TestimonialController;

//Todo: Clear after development
Route::view('419', 'errors.419');
Route::view('403', 'errors.403');
Route::view('404', 'errors.404');
Route::view('500', 'errors.500');

//! Login Routes
// Auth::routes();  // All routes for Authorisation
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
//!  Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//! BackEnd Routes
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {

    Route::get('/', DashboardController::class)->name('admin.dashboard');
    Route::resource('users', UserController::class);

    Route::get('files/page/{page?}', [FileController::class, 'index'])->name('files.index');

    Route::resources([
        'tags'         => TagController::class,
        'news'         => NewsController::class,
        'files'        => FileController::class,
        'roles'        => RoleController::class,
        'banners'      => BannerController::class,
        'priests'      => PriestController::class,
        'sliders'      => SliderController::class,
        'categories'   => CategoryController::class,
        'file-types'   => FileTypeController::class,
        'permissions'  => PermissionController::class,
        'static-pages' => StaticPageController::class,
        'testimonials' => TestimonialController::class,
    ], ['except' => 'show']);

    // Route::get('static-pages/{slug}/documents', [StaticDocumentController::class, 'index'])->name('documents.index');
});

//! FrontEnd Routes
Route::get('/', [HomeController::class, 'index'] )->name('home');

//! Section News
Route::get('/clanky', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/clanok/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/kategoria/{slug}', [ArticleController::class, 'category'])->name('article.category');
Route::get('/klucove-slovo/{slug}', [ArticleController::class, 'tag'])->name('article.tag');
Route::get('/autor/{slug}', [ArticleController::class, 'author'])->name('article.author');

//! Section Search
Route::get('/hladat/{search?}', [SearchController::class, 'searchAll'] )->name('search.all');
Route::get('/hladat-clanok/{search?}', [SearchController::class, 'searchNews'] )->name('search.news');

//! Section Contact
Route::get('/kontakt', [ContactController::class, 'index'] )->name('contact');

//! Section - ALL others websites
Route::get('{First}/{Second?}/{Third?}/{Fourth?}', [PageController::class, 'getPageFromUrl']);
