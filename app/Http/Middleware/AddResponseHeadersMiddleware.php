<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class AddResponseHeadersMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next) {

        $response = $next($request)
            ->header('Content-Language', config('app.faker_locale'))
            ->header('X-XSS-Protection', '1; mode=block')
            ->header('X-Download-Options', 'noopen')
            ->header('X-Frame-Options', 'SAMEORIGIN')
            ->header('X-Content-Type-Options', 'nosniff')
            ->header('X-Powered-By', 'Aplikaciu vytvoril Ondrej Vrto')
            ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains')
            ->header('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->header('Feature-Policy', "microphone 'none'; camera 'none'; geolocation 'none';");

            if ($time = Cache::get('___LAST_MODIFIED')) {
                $modifiedSince = $request->headers->get('If-Modified-Since');

                if ($modifiedSince && $time <= strtotime($modifiedSince)) {
                    $response->setStatusCode(Response::HTTP_NOT_MODIFIED);
                } else {
                    $response->header('Last-Modified', gmdate("D, d M Y H:i:s", $time)." GMT");
                }
            } else {
                Cache::forever('___LAST_MODIFIED', Carbon::now()->timestamp);
                Cache::forever('___RELOAD', true);
            }

            return $response;
    }
}
