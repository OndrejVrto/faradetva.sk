<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class CacheResponseMiddleware
{
    private $key;

    private $cachePage;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next) {
        $this->key = $this->cacheKey($request);

        $this->cachePage = Cache::get($this->key);

        if ($this->cachePage) {
            // CSP problem with nonce key in cache string
            $page = preg_replace('/nonce=".*"/mU', 'nonce="'.csp_nonce().'"', $this->cachePage);

            return response($page)->header('Content-Length', strlen($page));
        }

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response|RedirectResponse $response): void {
        if (get_class($response) != 'Illuminate\Http\Response') {
            return;
        }
        if ($this->cachePage) {
            return;
        }
        if ($response->getStatusCode() === Response::HTTP_OK) {
            Cache::forever($this->key, $response->getContent());
        }
    }

    private function cacheKey(Request $request): string {
        // dd($request->fullUrl());
        return 'X_FRONTEND_' . md5($request->fullUrl());
    }
}
