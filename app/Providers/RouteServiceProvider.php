<?php declare(strict_types=1);

namespace App\Providers;

use App\Models\NoticeChurch;
use Illuminate\Http\Request;
use App\Models\NoticeAcolyte;
use App\Models\NoticeLecturer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    final public const HOME = '/admin/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     */
    public function boot(): void {
        // Route::resourceVerbs([
        //     'create' => 'vytvorit',
        //     'edit' => 'editovat',
        // ]);

        $this->configureRateLimiting();

        $this->routes(function (): void {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            if (App::environment(['local', 'dev', 'staging'])) {
                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/develop.php'));
            }

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group([  // @phpstan-ignore-line
                    base_path('routes/auth.php'),
                    base_path('routes/admin.php'),
                    base_path('routes/web.php'),
                ]);
        });

        Route::bind('notice-church', fn ($val) => NoticeChurch::whereSlug($val)->firstOrFail());
        Route::bind('notice-acolyte', fn ($val) => NoticeAcolyte::whereSlug($val)->firstOrFail());
        Route::bind('notice-lecturer', fn ($val) => NoticeLecturer::whereSlug($val)->firstOrFail());
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting() {
        RateLimiter::for(
            name: 'api',
            callback: fn (Request $request) => Limit::perMinute(60)
                                                    ->by(
                                                        optional($request->user())->id
                                                        ?: $request->ip()
                                                    )
        );
    }
}
