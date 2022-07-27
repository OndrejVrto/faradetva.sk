<?php

use Illuminate\Support\Facades\Route;

//! routes only for develop
Route::get('401', fn () => abort(401));
Route::get('403', fn () => abort(403));
Route::get('404', fn () => abort(404));
Route::get('419', fn () => abort(419));
Route::get('429', fn () => abort(429));
Route::get('500', fn () => abort(500));
Route::get('503', fn () => abort(503));
