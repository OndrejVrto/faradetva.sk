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

        // for Develop
        // url adres in Nqrock
        if (!empty( env('NGROK_URL') ) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
            $this->app['url']->forceRootUrl(env('NGROK_URL'));
        }

        // $this->RouteAutomat($request);

        // Route::resourceVerbs([
        //     'create' => 'vytvorit',
        //     'edit' => 'editovat',
        // ]);

        // Loging all Querys to file
        DB::listen(function ($query) {
            File::prepend(
                storage_path('/logs/query.log'),
                '[' . date('Y-m-d H:i:s') . '] [' . $query->time . ' ms]' . PHP_EOL . $query->sql . PHP_EOL . '{' . implode(', ', $query->bindings) . '}' . PHP_EOL . PHP_EOL
            );
        });

    }

    // private function RouteAutomat(Request $request) {

    //     $path_array = $request->segments();

    //     $backend_route = config('app.backend_route');
    //     $frontend_route = config('app.frontend_route');

    //     //https://locahost:8000/admin/anything
    //     if (in_array($backend_route, $path_array)) {
    //         $path = resource_path($backend_route. '\views'); //resources/admin/views
    //     } else {
    //         $path = resource_path($frontend_route. '\views');
    //     }

    //     View::addLocation($path);
    // }
}
