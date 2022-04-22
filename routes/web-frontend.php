<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\SubscribeController;

//! FrontEnd Routes
Route::middleware('response.headers', 'csp.headers', 'cache.response', 'preety.html')->group(function() {

    Route::get('/', HomeController::class)->name('home');

    //! Subscribe and mail
    Route::controller(SubscribeController::class)->group(function () {
        Route::get('verifikovat-email/{slug}/{subscriber}/{token}', 'verifyMail')
            ->whereUuid('subscriber')
            ->missing(function () {
                return Redirect::route('home');
            })
            ->name('verify-mail');

        Route::get('zrusit-odber/{slug}/{subscriber}/{unsubscribetoken}', 'unsubscribe')
            ->whereUuid('subscriber')
            ->missing(function () {
                return Redirect::route('home');
            })
            ->name('unsubscribe');
    });

    //! Section News article
    Route::controller(ArticleController::class)->name('article.')->group(function () {
        Route::get('clanok/{slug}', 'show')->name('show');
        Route::get('clanky', 'indexAll')->name('all');
        Route::get('clanky-v-kategorii/{slug}', 'indexCategory')->name('category');
        Route::get('clanky-podla-klucoveho-slova/{slug}', 'indexTag')->name('tag');
        Route::get('clanky-podla-autora/{slug}', 'indexAuthor')->name('author');
        Route::get('clanky-z-roku/{year}', 'indexDate')->where('year', '^(20\d\d)$')->name('date');
        Route::get('hladat-v-clankoch/{search?}', 'indexSearch')->withoutMiddleware('cache.response')->name('search');
    });

    //! Section Search
    Route::get('hladat/{search?}', SearchController::class)->withoutMiddleware('cache.response')->name('search.all');

    //! Section - ALL others websites
    Route::get('{First}/{Second?}/{Third?}/{Fourth?}/{Fifth?}', PageController::class)->name('pages.others');
});
