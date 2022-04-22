<?php

use Spatie\Csp\AddCspHeaders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Auth::routes();  // All routes for Authorisation
Route::controller(LoginController::class)->group(function () {
    //! Login Routes
    Route::get('login', 'showLoginForm')->middleware(AddCspHeaders::class, 'preety.html')->name('login');
    Route::post('login', 'login');
    //!  Logout Route
    Route::post('logout', 'logout')->name('logout');
});
