<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FileTypeController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\Backend\TestimonialController;

// only for development
Route::view('419', 'errors.419');
Route::view('403', 'errors.403');
Route::view('404', 'errors.404');
Route::view('500', 'errors.500');

/** Login Routes */
// Auth::routes();  // All routes for Authorisation
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
/**  Logout Route */
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/** BackEnd Routes */
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);

    Route::resources([
        'tags'         => TagController::class,
        'news'         => NewsController::class,
        'files'        => FileController::class,
        'roles'        => RoleController::class,
        'priests'      => PriestController::class,
        'sliders'      => SliderController::class,
        'categories'   => CategoryController::class,
        'file-types'   => FileTypeController::class,
        'permissions'  => PermissionController::class,
        'static-pages' => StaticPageController::class,
        'testimonials' => TestimonialController::class,
    ], ['except' => 'show']);

    // Route::get('static-pages/{slug}/documents', [StaticDocumentController::class, 'index'])->name('documents.index');
    Route::resource('banners', BannerController::class, ['except' => 'show']);
});

/** FrontEnd Routes */
Route::get('/', [PageController::class, 'home'] )->name('home');
Route::get('/frantisek', [PageController::class, 'francisco'] )->name('static.francisco');
Route::get('/kontakt', [PageController::class, 'contact'] )->name('contact');
/** News atricle */
Route::get('/clanky', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/clanok/{slug}', [ArticleController::class, 'show'])->name('article.show');
/** Search routes */
Route::get('/hladat/{search?}', [SearchController::class, 'searchAll'] )->name('search.all');
Route::get('/hladat-clanok/{search?}', [SearchController::class, 'searchNews'] )->name('search.news');

// TODO:  one controler to all static page
// Route::group(['prefix' => 'first'], function () {
    // Route::get('{pageName}', [StaticPagesController::class, 'getPageByName']);
// });


