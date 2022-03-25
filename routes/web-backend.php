<?php

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
use App\Http\Controllers\Backend\PrayerController;
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
use App\Http\Controllers\Backend\NoticeChurchController;
use App\Http\Controllers\Backend\NoticeAcolyteController;
use Lab404\Impersonate\Controllers\ImpersonateController;
use App\Http\Controllers\Backend\NoticeLecturerController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

//!  Inpersonate OUT Route

//!  Store files from dropzone and download zip files
Route::prefix('admin')->group( function() {
    Route::post('news/media', [NewsController::class, 'storeMedia'])->name('news.storeMedia');
    Route::get('impersonate/leave', [ImpersonateController::class, 'leave'])->name('impersonate.leave');

    Route::controller(GalleryController::class)->name('galleries.')->group(function () {
        Route::post('galleries/media', 'storeMedia')->name('storeMedia');
        Route::get('galleries/{gallery}/download', 'download')->name('download');
    });

    Route::middleware(['auth', 'permission'])->group( function() {
        //!  Main routes
        Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
        Route::permanentRedirect('/', '/admin/dashboard');

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
            Route::get('crawl-all-url', 'crawlAllUrl')->name('crawl-all-url');
            Route::get('caches-data-stop', 'cacheDataStop')->name('data.stop');
            Route::get('caches-data-start', 'cacheDataStart')->name('data.start');
            Route::get('caches-data-reset', 'cacheDataReset')->name('data.reset');
            Route::get('failed-jobs-delete', 'deleteFailedJobs')->name('jobs.delete');
            Route::get('failed-jobs-restart', 'restartFailedJobs')->name('jobs.restart');
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

        //!  Resource routes
        Route::resources([
            'users'     => UserController::class,
            'charts'    => ChartController::class,
            'banners'   => BannerController::class,
            'pictures'  => PictureController::class,
            'galleries' => GalleryController::class,
        ]);

        Route::resources([
            'tags'            => TagController::class,
            'news'            => NewsController::class,
            'files'           => FileController::class,
            'roles'           => RoleController::class,
            'prayers'         => PrayerController::class,
            'priests'         => PriestController::class,
            'sliders'         => SliderController::class,
            'categories'      => CategoryController::class,
            'charts.data'     => ChartDataController::class,
            'permissions'     => PermissionController::class,
            'static-pages'    => StaticPageController::class,
            'testimonials'    => TestimonialController::class,
            'notice-church'   => NoticeChurchController::class,
            'notice-acolyte'  => NoticeAcolyteController::class,
            'notice-lecturer' => NoticeLecturerController::class,
        ], ['except' => 'show']);
    });
});
