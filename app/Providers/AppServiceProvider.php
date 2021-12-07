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
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

		Paginator::useBootstrap();

		$this->RouteAutomat($request);

		Route::resourceVerbs([
			'create' => 'vytvorit',
			'edit' => 'editovat',
		]);

		DB::listen(function ($query) {
			File::append(
				storage_path('/logs/query.log'),
				'[' . date('Y-m-d H:i:s') . '] [' . $query->time . ' ms]' . PHP_EOL . $query->sql . PHP_EOL . '{' . implode(', ', $query->bindings) . '}' . PHP_EOL . PHP_EOL
			);
		});

    }


	private function RouteAutomat(Request $request) {

		$path_array = $request->segments();
        $admin_route = config('app.admin_route');

        //https://locahost:8000/admin/anything
        if (in_array($admin_route, $path_array)) {
            config(['app.app_scope' => 'admin']);
        }

        $app_scope = config('app.app_scope');

        if ($app_scope == 'admin') {
            $path = resource_path('admin/views'); //resources/admin/views
        } else {
            $path = resource_path('front/views');
        }

		View::addLocation($path);
	}

}
