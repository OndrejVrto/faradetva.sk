<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Lab404\Impersonate\Controllers\ImpersonateController;
use App\Http\Controllers\Admin\NoticeLecturerController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

use App\Http\Controllers\Admin\{
    FaqController, TagController, FileController, NewsController,
    RoleController, UserController, ChartController, BannerController,
    PrayerController, PriestController, SliderController, DayIdeaController,
    GalleryController, PictureController, CategoryController, ChartDataController,
    DashboardController, PermissionController, StaticPageController, TestimonialController,
    NoticeChurchController, NoticeAcolyteController, BackgroundPictureController,
};

Route::prefix('admin')->group( function() {
    //!  Inpersonate OUT
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


    Route::middleware(['auth', 'permission'])->group( function() {

        //!  Main routes
        Route::permanentRedirect('/', '/admin/dashboard');

        //!  Filemanager for TinyMCE Editor
        Route::prefix('laravel-file-manager')->group( function() {
            Lfm::routes();
        });

        //!  Activity plugin
        Route::controller(ActivityController::class)->name('log-activity.')->group(function () {
            Route::get('users-activity', 'getIndex')->name('index');
            Route::post('users-activity', 'handlePostRequest')->name('post');
        });

        //!  Inpersonate IN
        Route::get('impersonate/take/{id}/{guardName?}', [ImpersonateController::class, 'take'])->whereNumber('id')->name('impersonate');

        $softDeleteMethodes = [
            'tags'            => TagController::class,
            'news'            => NewsController::class,
            'users'           => UserController::class,
            'charts'          => ChartController::class,
            'prayers'         => PrayerController::class,
            'priests'         => PriestController::class,
            'sliders'         => SliderController::class,
            'categories'      => CategoryController::class,
            'static-pages'    => StaticPageController::class,
            'testimonials'    => TestimonialController::class,
            'notice-church'   => NoticeChurchController::class,
            'notice-acolyte'  => NoticeAcolyteController::class,
            'notice-lecturer' => NoticeLecturerController::class,
        ];
        //!  Supplementing resource routes with restore and force delete methods
        foreach ($softDeleteMethodes as $name => $class) {
            Route:: post($name.'/{id}/restore', [$class, 'restore'])->name($name.'.restore');
            Route:: post($name.'/{id}/force_delete', [$class, 'force_delete'])->name($name.'.force_delete');
        }

        Route::controller(DashboardController::class)->name('admin.dashboard.')->prefix('dashboard')->group(function () {
            Route::patch('settings', 'settings')->name('settings');
            Route::get('health-fresh', 'fresh')->name('health-fresh');
            Route::get('commands/{command}', 'commands')->name('commands');
            Route::patch('maintenance-mode', 'maintenance')->name('maintenance');
        });


        Route::middleware('preety.html')->group( function() {

            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::resources([
                'users'               => UserController::class,
                'charts'              => ChartController::class,
                'banners'             => BannerController::class,
                'pictures'            => PictureController::class,
                'galleries'           => GalleryController::class,
                'background-pictures' => BackgroundPictureController::class,
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
});
