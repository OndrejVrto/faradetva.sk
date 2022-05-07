<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Lab404\Impersonate\Controllers\ImpersonateController;
use App\Http\Controllers\Admin\NoticeLecturerController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

use App\Http\Controllers\Admin\{
    FaqController, TagController, FileController, NewsController,
    RoleController, UserController, CacheController, ChartController,
    BannerController, PrayerController, PriestController, SliderController,
    DayIdeaController, GalleryController, PictureController, CategoryController,
    ChartDataController, DashboardController, PermissionController, StaticPageController,
    TestimonialController, NoticeChurchController, NoticeAcolyteController
};

Route::prefix('admin')->group( function() {
    //!  Inpersonate OUT Route
    Route::get('impersonate/leave', [ImpersonateController::class, 'leave'])->name('impersonate.leave');

    //!  Store files from dropzone and download zip files
    Route::controller(GalleryController::class)->name('galleries.')->group(function () {
        Route::post('galleries/media', 'storeMedia')->name('storeMedia');
        Route::get('galleries/{gallery}/download', 'download')->name('download');
    });
    Route::controller(NewsController::class)->name('news.')->group(function () {
        Route::post('news/media', 'storeMedia')->name('storeMedia');
        Route::get('news/{news}/download', 'download')->name('download');
    });


    Route::middleware(['auth', 'permission', 'preety.html'])->group( function() {
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
            Route::get('xdebug-php', 'xdebugPHP')->name('xdebug');
            Route::get('caches-stop', 'cachesStop')->name('stop');
            Route::get('caches-start', 'cachesStart')->name('start');
            Route::get('caches-reset', 'cachesReset')->name('reset');
            Route::get('crawl-search', 'crawlSearch')->name('crawl-search');
            Route::get('text-features', 'testFeatures')->name('testFeatures');
            Route::get('crawl-all-url', 'crawlAllUrl')->name('crawl-all-url');
            Route::get('caches-data-stop', 'cacheDataStop')->name('data.stop');
            Route::get('caches-data-start', 'cacheDataStart')->name('data.start');
            Route::get('caches-data-reset', 'cacheDataReset')->name('data.reset');
            Route::get('failed-jobs-delete', 'deleteFailedJobs')->name('jobs.delete');
            Route::get('failed-jobs-restart', 'restartFailedJobs')->name('jobs.restart');
        });

        //!  Inpersonate IN Route
        Route::get('impersonate/take/{id}/{guardName?}', [ImpersonateController::class, 'take'])->whereNumber('id')->name('impersonate');

        //!  Activity plugin
        Route::controller(ActivityController::class)->name('log-activity.')->group(function () {
            Route::get('users-activity', 'getIndex')->name('index');
            Route::post('users-activity', 'handlePostRequest')->name('post');
        });

        //!  Supplementing resource routes with restore methods
        Route:: post('tags/{id}/restore', [TagController::class, 'restore'])->name('tags.restore');
        Route:: post('news/{id}/restore', [NewsController::class, 'restore'])->name('news.restore');
        Route:: post('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route:: post('charts/{id}/restore', [ChartController::class, 'restore'])->name('charts.restore');
        Route:: post('prayers/{id}/restore', [PrayerController::class, 'restore'])->name('prayers.restore');
        Route:: post('priests/{id}/restore', [PriestController::class, 'restore'])->name('priests.restore');
        Route:: post('sliders/{id}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
        Route:: post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        Route:: post('static-pages/{id}/restore', [StaticPageController::class, 'restore'])->name('static-pages.restore');
        Route:: post('testimonials/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
        Route:: post('notice-church/{id}/restore', [NoticeChurchController::class, 'restore'])->name('notice-church.restore');
        Route:: post('notice-acolyte/{id}/restore', [NoticeAcolyteController::class, 'restore'])->name('notice-acolyte.restore');
        Route:: post('notice-lecturer/{id}/restore', [NoticeLecturerController::class, 'restore'])->name('notice-lecturer.restore');

        //!  Supplementing resource routes with force delete methods
        Route:: post('tags/{id}/force_delete', [TagController::class, 'force_delete'])->name('tags.force_delete');
        Route:: post('news/{id}/force_delete', [NewsController::class, 'force_delete'])->name('news.force_delete');
        Route:: post('users/{id}/force_delete', [UserController::class, 'force_delete'])->name('users.force_delete');
        Route:: post('charts/{id}/force_delete', [ChartController::class, 'force_delete'])->name('charts.force_delete');
        Route:: post('prayers/{id}/force_delete', [PrayerController::class, 'force_delete'])->name('prayers.force_delete');
        Route:: post('priests/{id}/force_delete', [PriestController::class, 'force_delete'])->name('priests.force_delete');
        Route:: post('sliders/{id}/force_delete', [SliderController::class, 'force_delete'])->name('sliders.force_delete');
        Route:: post('categories/{id}/force_delete', [CategoryController::class, 'force_delete'])->name('categories.force_delete');
        Route:: post('static-pages/{id}/force_delete', [StaticPageController::class, 'force_delete'])->name('static-pages.force_delete');
        Route:: post('testimonials/{id}/force_delete', [TestimonialController::class, 'force_delete'])->name('testimonials.force_delete');
        Route:: post('notice-church/{id}/force_delete', [NoticeChurchController::class, 'force_delete'])->name('notice-church.force_delete');
        Route:: post('notice-acolyte/{id}/force_delete', [NoticeAcolyteController::class, 'force_delete'])->name('notice-acolyte.force_delete');
        Route:: post('notice-lecturer/{id}/force_delete', [NoticeLecturerController::class, 'force_delete'])->name('notice-lecturer.force_delete');

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
            'faqs'            => FaqController::class,
            'news'            => NewsController::class,
            'files'           => FileController::class,
            'roles'           => RoleController::class,
            'prayers'         => PrayerController::class,
            'priests'         => PriestController::class,
            'sliders'         => SliderController::class,
            'day-ideas'       => DayIdeaController::class,
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
