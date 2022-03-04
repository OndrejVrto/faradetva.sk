<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CacheResponseMiddleware
{
    private $time;

    private $key;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, int $time = null) {
        $this->time = $time ?? Carbon::now()->addDay();
        $this->key = $this->cacheKey($request);

        if (Cache::has($this->key)) {
            return response(Cache::get($this->key));
        }

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void {
        if (Cache::has($this->key)) {
            return;
        }
        if ($response->getStatusCode() === Response::HTTP_OK) {
            Cache::put($this->key, $response->getContent(), $this->time);
        }
    }

    private function cacheKey(Request $request): string {
        return '_FRONTEND_' . md5($request->fullUrl() . '_' . auth()->id());
    }
}
