<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CacheController;
use App\Http\Controllers\Backend\ChartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PictureController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\NoticesController;
use App\Http\Controllers\Backend\ChartDataController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\TestimonialController;
use Lab404\Impersonate\Controllers\ImpersonateController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

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
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//!  Inpersonate OUT Route
Route::get('impersonate/leave', [ImpersonateController::class, 'leave'])->name('impersonate.leave');

//!  Store dropzone Documents
Route::post('news/media', [NewsController::class, 'storeMedia'])->name('news.storeMedia');
Route::post('galleries/media', [GalleryController::class, 'storeMedia'])->name('galleries.storeMedia');

//! BackEnd Routes
Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {

    //!  Filemanager for TinyMCE Editor
    Route::prefix('laravel-file-manager')->group( function() {
        Lfm::routes();
    });

    //!  Caches
    Route::get('start-caches', [CacheController::class, 'startCaches'])->name('cache.start');
    Route::get('clear-caches', [CacheController::class, 'clearCaches'])->name('cache.stop');
    Route::get('clear-data-caches', [CacheController::class, 'clearDataCaches'])->name('cache-data.stop');
    Route::get('reset-caches', [CacheController::class, 'resetCaches'])->name('cache.reset');

    //!  Filemanager for Static-pages
    Route::get('file-manager', FileManagerController::class)->name('file-manager');

    //!  Inpersonate IN Route
    Route::get('impersonate/take/{id}/{guardName?}', [ImpersonateController::class, 'take'])->whereNumber('id')->name('impersonate');

    //!  Activity plugin
    Route::get('users-activity', [ActivityController::class, 'getIndex'])->name('log-activity.index');
    Route::post('users-activity', [ActivityController::class, 'handlePostRequest'])->name('log-activity.post');

    //!  Main route
    Route::redirect('/', '/admin/dashboard', 308);
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    // Route::get('files/page/{page?}', [FileController::class, 'index'])->name('files.index');

    Route::resource('users', UserController::class);
    Route::resource('charts', ChartController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resources([
        'tags'         => TagController::class,
        'news'         => NewsController::class,
        'files'        => FileController::class,
        'roles'        => RoleController::class,
        'notices'      => NoticeController::class,
        'banners'      => BannerController::class,
        'priests'      => PriestController::class,
        'sliders'      => SliderController::class,
        'pictures'     => PictureController::class,
        'categories'   => CategoryController::class,
        'charts.data'  => ChartDataController::class,
        'permissions'  => PermissionController::class,
        'static-pages' => StaticPageController::class,
        'testimonials' => TestimonialController::class,
    ], ['except' => 'show']);
});

//! FrontEnd Routes
Route::get('/', HomeController::class)->name('home');
Route::get('kontakt', ContactController::class)->name('contact');
Route::get('oznamy', NoticesController::class)->name('notices.pdf');

//! Section News article
Route::controller(ArticleController::class)->name('article.')->group(function () {
    Route::get('clanok/{slug}', 'show')->name('show');
    Route::get('clanky', 'indexAll')->name('all');
    Route::get('clanky-v-kategorii/{slug}', 'indexCategory')->name('category');
    Route::get('clanky-podla-klucoveho-slova/{slug}', 'indexTag')->name('tag');
    Route::get('clanky-podla-autora/{slug}', 'indexAuthor')->name('author');
    Route::get('clanky-z-roku/{year}', 'indexDate')->where('year', '^(20\d\d)$')->name('date');
    Route::get('hladat-clanok/{search?}', 'indexSearch')->name('search');
});

//! Section Search
Route::get('hladat/{search?}', SearchController::class)->name('search.all');

//! Section - ALL others websites
Route::get('{First}/{Second?}/{Third?}/{Fourth?}', PageController::class);
