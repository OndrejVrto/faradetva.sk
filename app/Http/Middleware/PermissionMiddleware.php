<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware {
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, null|array|string $permission = null, string $guard = null): mixed {
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if (! is_null($permission)) {
            $permissions = is_array($permission)
                ? $permission
                : explode('|', $permission);
        } else {
            $permissions = [];
            $routeName = $request->route();

            if ($routeName instanceof Route) {
                $permissions[] = $routeName->getName();
            }
        }

        foreach ($permissions as $permission) {
            if ($authGuard->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
