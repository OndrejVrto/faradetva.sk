<?php

use Illuminate\Support\Facades\Route;

//! routes only for develop
Route::view('419', 'errors.419');
Route::view('403', 'errors.403');
Route::view('404', 'errors.404');
Route::view('500', 'errors.500');
