<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Web\{
    FaqController, HomeController,
    PageController, SearchController,
    ArticleController
};
use App\Http\Controllers\Support\SubscribeController;

//! FrontEnd Routes
Route::middleware('fast_web')->group(function() {

    Route::feeds();

    Route::get('/', HomeController::class)->name('home');
    Route::get('/otazky-a-odpovede', FaqController::class)->name('faq');

    //! Subscribe and mail
    Route::controller(SubscribeController::class)->withoutMiddleware('cacheResponse')->group(function () {
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
        Route::get('hladat-v-clankoch/{search?}', 'indexSearch')->withoutMiddleware('cacheResponse')->name('search');
    });

    //! Section Search
    Route::get('hladat/{search?}', SearchController::class)->withoutMiddleware('cacheResponse')->name('search.all');

    //! Section - ALL others websites
    Route::get('{First}/{Second?}/{Third?}/{Fourth?}/{Fifth?}', PageController::class)->name('pages.others');
});
