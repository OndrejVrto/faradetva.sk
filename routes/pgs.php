<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pgs\StromcekController;

// Route::middleware('fast_web')->group(function() {

    Route::get('/vianocny_stromcek/{layer?}/{color?}', StromcekController::class)
        ->whereNumber('layer')
        ->where('color', '^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$')
        ->name('psg.test');

// });
