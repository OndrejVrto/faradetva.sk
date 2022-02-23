<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function register() {
        //
    }

    public function boot(Request $request) {
        // for Develop
        // url adres in Nqrock
        if (!empty( env('NGROK_URL') ) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
            $this->app['url']->forceRootUrl(env('NGROK_URL'));
        }

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
