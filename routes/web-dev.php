<?php

use Illuminate\Support\Facades\Route;

//! routes only for develop
Route::view(uri: '419', view: 'errors.419', status: 419);
Route::view(uri: '403', view: 'errors.403', status: 403);
Route::view(uri: '404', view: 'errors.404', status: 404);
Route::view(uri: '500', view: 'errors.500', status: 500);
