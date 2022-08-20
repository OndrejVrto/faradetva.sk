<?php declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class AddResponseHeadersMiddleware {
    /**
     * @throws BindingResolutionException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    public function handle(Request $request, Closure $next): mixed {
        $response = $next($request)
            // ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains')             // duplicate on production with my web provider
            // ->header('X-XSS-Protection', '1; mode=block')                                            // duplicate on production with my web provider
            // ->header('X-Content-Type-Options', 'nosniff')                                            // duplicate on production with my web provider
            // ->header('X-Frame-Options', 'SAMEORIGIN')                                                // duplicate on production with my web provider
            // ->header('Feature-Policy', "microphone 'none'; camera 'none'; geolocation 'none';")      // deprecated -> use Permissions-Policy
            ->header('Report-To', '{"group":"default","max_age":31536000,"endpoints":[{"url":"https://faradetva.report-uri.com/a/d/g"}],"include_subdomains":true}')
            ->header('NEL', '{"report_to":"default","max_age":31536000,"include_subdomains":true}')
            ->header('Content-Language', config('app.faker_locale'))
            ->header('X-Download-Options', 'noopen')
            ->header('X-App-Author', 'Aplikaciu vytvoril Ondrej Vrto v aplikacii Laravel.')
            ->header('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->header('Permissions-Policy', "accelerometer=(), ambient-light-sensor=(), autoplay=(), battery=(), camera=(), cross-origin-isolated=(), display-capture=(self), document-domain=(), encrypted-media=(), execution-while-not-rendered=(), execution-while-out-of-viewport=(), fullscreen=(self), geolocation=(), gyroscope=(), keyboard-map=(), magnetometer=(), microphone=(), midi=(), navigation-override=(), payment=(), picture-in-picture=(self), publickey-credentials-get=(), screen-wake-lock=(), sync-xhr=(), usb=(), web-share=(self), xr-spatial-tracking=(), clipboard-read=(self), clipboard-write=(self), gamepad=(), speaker-selection=(), conversion-measurement=(), focus-without-user-activation=(), hid=(), idle-detection=(), interest-cohort=(), serial=(), sync-script=(), trust-token-redemption=(), window-placement=(), vertical-scroll=()");    // create with https://www.permissionspolicy.com

        $store = customConfig('crawler');

        if ($store->has('___LAST_MODIFIED')) {
            $time = (int)$store->get('___LAST_MODIFIED');
            $modifiedSince = $request->headers->get('If-Modified-Since');

            if ($modifiedSince && $time <= strtotime($modifiedSince)) {
                $response->setStatusCode(Response::HTTP_NOT_MODIFIED);
            } else {
                $response->header('Last-Modified', gmdate("D, d M Y H:i:s", $time)." GMT");
            }
        } else {
            $store->put('___LAST_MODIFIED', Carbon::now()->getTimestamp());
            $store->put('___RELOAD', "true");
        }

        return $response;
    }
}
