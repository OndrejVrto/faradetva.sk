<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request) {

        Paginator::useBootstrap();

        // Loging all Querys to file
        DB::listen(function ($query) {
            File::prepend(
                storage_path('/logs/query.log'),
                '[' . date('Y-m-d H:i:s') . '] [' . $query->time . ' ms]' . PHP_EOL . $query->sql . PHP_EOL . '{' . implode(', ', $query->bindings) . '}' . PHP_EOL . PHP_EOL
            );
        });
    }
}
