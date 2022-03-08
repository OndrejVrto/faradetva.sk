<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CacheResponseMiddleware
{
    private $key;

    private $hasCache;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next) {
        $this->key = $this->cacheKey($request);
        $this->hasCache = Cache::has($this->key);

        if ($this->hasCache) {
            $data = Cache::get($this->key);
            return response($data)
                ->header('Content-Length', strlen($data));
        }

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void {
        if ($this->hasCache) {
            return;
        }
        if ($response->getStatusCode() === Response::HTTP_OK) {
            Cache::forever($this->key, $response->getContent());
        }
    }

    private function cacheKey(Request $request): string {
        return 'X_FRONTEND_' . md5($request->fullUrl() . '_' . auth()->id());
    }
}
