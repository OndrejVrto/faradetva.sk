<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        // \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'fast_web' => [
            // 'header.http2.link',
            'csp.headers',
            'response.headers',
            'preety.html',
            'cacheResponse',
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'password.confirm'   => \Illuminate\Auth\Middleware\RequirePassword::class,
        'role'               => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'signed'             => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'verified'           => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth.basic'         => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

        'cacheResponse'      => \Spatie\ResponseCache\Middlewares\CacheResponse::class,
        'doNotCacheResponse' => \Spatie\ResponseCache\Middlewares\DoNotCacheResponse::class,

        'csp.headers'        => \Spatie\Csp\AddCspHeaders::class,
        'auth'               => \App\Http\Middleware\Authenticate::class,
        'can'                => \Illuminate\Auth\Middleware\Authorize::class,
        'header.http2.link'  => \App\Http\Middleware\AddHttp2ServerPush::class,
        'permission'         => \App\Http\Middleware\PermissionMiddleware::class,
        'preety.html'        => \App\Http\Middleware\PreetyHtmlMiddleware::class,
        'cache.headers'      => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'guest'              => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle'           => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'response.headers'   => \App\Http\Middleware\AddResponseHeadersMiddleware::class,
    ];
}
