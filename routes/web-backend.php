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

        //!  Supplementing resource routes with restore methods
        Route:: post('tags/{tag}/restore', [TagController::class, 'restore'])->name('tags.restore');
        Route:: post('news/{news}/restore', [NewsController::class, 'restore'])->name('news.restore');
        Route:: post('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route:: post('charts/{chart}/restore', [ChartDataController::class, 'restore'])->name('charts.restore');
        Route:: post('prayers/{prayer}/restore', [PrayerController::class, 'restore'])->name('prayers.restore');
        Route:: post('priests/{priest}/restore', [PriestController::class, 'restore'])->name('priests.restore');
        Route:: post('sliders/{slider}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
        Route:: post('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        Route:: post('charts/{chart}/data/{data}/restore', [ChartDataController::class, 'restore'])->name('charts.data.restore');
        Route:: post('static-pages/{static_page}/restore', [StaticPageController::class, 'restore'])->name('static-pages.restore');
        Route:: post('testimonials/{testimonial}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
        Route:: post('notice-church/{notice_church}/restore', [NoticeChurchController::class, 'restore'])->name('notice-church.restore');
        Route:: post('notice-acolyte/{notice_acolyte}/restore', [NoticeAcolyteController::class, 'restore'])->name('notice-acolyte.restore');
        Route:: post('notice-lecturer/{notice_lecturer}/restore', [NoticeLecturerController::class, 'restore'])->name('notice-lecturer.restore');

        //!  Supplementing resource routes with force delete methods
        Route:: post('tags/{tag}/force_delete', [TagController::class, 'force_delete'])->name('tags.force_delete');
        Route:: post('news/{news}/force_delete', [NewsController::class, 'force_delete'])->name('news.force_delete');
        Route:: post('users/{user}/force_delete', [UserController::class, 'force_delete'])->name('users.force_delete');
        Route:: post('charts/{chart}/force_delete', [ChartDataController::class, 'force_delete'])->name('charts.force_delete');
        Route:: post('prayers/{prayer}/force_delete', [PrayerController::class, 'force_delete'])->name('prayers.force_delete');
        Route:: post('priests/{priest}/force_delete', [PriestController::class, 'force_delete'])->name('priests.force_delete');
        Route:: post('sliders/{slider}/force_delete', [SliderController::class, 'force_delete'])->name('sliders.force_delete');
        Route:: post('categories/{category}/force_delete', [CategoryController::class, 'force_delete'])->name('categories.force_delete');
        Route:: post('charts/{chart}/data/{data}/force_delete', [ChartDataController::class, 'force_delete'])->name('charts.data.force_delete');
        Route:: post('static-pages/{static_page}/force_delete', [StaticPageController::class, 'force_delete'])->name('static-pages.force_delete');
        Route:: post('testimonials/{testimonial}/force_delete', [TestimonialController::class, 'force_delete'])->name('testimonials.force_delete');
        Route:: post('notice-church/{notice_church}/force_delete', [NoticeChurchController::class, 'force_delete'])->name('notice-church.force_delete');
        Route:: post('notice-acolyte/{notice_acolyte}/force_delete', [NoticeAcolyteController::class, 'force_delete'])->name('notice-acolyte.force_delete');
        Route:: post('notice-lecturer/{notice_lecturer}/force_delete', [NoticeLecturerController::class, 'force_delete'])->name('notice-lecturer.force_delete');

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
