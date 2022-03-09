<?php

use Illuminate\Http\Response;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CacheController;
use App\Http\Controllers\Backend\ChartController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\PriestController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PictureController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChartDataController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\TestimonialController;
use Lab404\Impersonate\Controllers\ImpersonateController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

//!  Inpersonate OUT Route
Route::get('impersonate/leave', [ImpersonateController::class, 'leave'])->name('impersonate.leave');

//!  Store dropzone Documents
Route::post('news/media', [NewsController::class, 'storeMedia'])->name('news.storeMedia');
Route::post('galleries/media', [GalleryController::class, 'storeMedia'])->name('galleries.storeMedia');


Route::middleware(['auth', 'permission'])->prefix('admin')->group( function() {

    //!  Filemanager for TinyMCE Editor
    Route::prefix('laravel-file-manager')->group( function() {
        Lfm::routes();
    });

    //!  Cache and info
    Route::controller(CacheController::class)->name('cache.')->group(function () {
        Route::get('info-php', 'infoPHP')->name('info');
        Route::get('caches-stop', 'cachesStop')->name('stop');
        Route::get('caches-start', 'cachesStart')->name('start');
        Route::get('caches-reset', 'cachesReset')->name('reset');
        Route::get('caches-data-stop', 'cacheDataStop')->name('data.stop');
        Route::get('caches-data-start', 'cacheDataStart')->name('data.start');
        Route::get('caches-data-reset', 'cacheDataReset')->name('data.reset');
        Route::get('check-all-url-static-pages', 'checkAllUrlStaticPages')->name('check.all-url');
    });

    //!  Filemanager for Static-pages
    Route::get('file-manager', FileManagerController::class)->name('file-manager');

    //!  Inpersonate IN Route
    Route::get('impersonate/take/{id}/{guardName?}', [ImpersonateController::class, 'take'])->whereNumber('id')->name('impersonate');

    //!  Activity plugin
    Route::controller(ActivityController::class)->name('log-activity.')->group(function () {
        Route::get('users-activity', 'getIndex')->name('index');
        Route::post('users-activity', 'handlePostRequest')->name('post');
    });

    //!  Main routes
    Route::redirect('/', '/admin/dashboard', Response::HTTP_PERMANENTLY_REDIRECT);
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');

    Route::resources([
        'users'     => UserController::class,
        'charts'    => ChartController::class,
        'banners'   => BannerController::class,
        'pictures'  => PictureController::class,
        'galleries' => GalleryController::class,
    ]);

    Route::resources([
        'tags'         => TagController::class,
        'news'         => NewsController::class,
        'files'        => FileController::class,
        'roles'        => RoleController::class,
        'notices'      => NoticeController::class,
        'priests'      => PriestController::class,
        'sliders'      => SliderController::class,
        'categories'   => CategoryController::class,
        'charts.data'  => ChartDataController::class,
        'permissions'  => PermissionController::class,
        'static-pages' => StaticPageController::class,
        'testimonials' => TestimonialController::class,
    ], ['except' => 'show']);
});
