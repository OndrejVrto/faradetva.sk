<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait Restorable
{
    public function scopeArchive(Builder $query, Request $request, string $modelName) {
        return $query
            ->when($request->has('only-archive') AND $this->can($modelName), function ($query) {
                $query->onlyTrashed();
            })
            ->when($request->has('with-archive') AND $this->can($modelName), function ($query) {
                $query->withTrashed();
            });
        }

    private function can(string $modelName): bool
    {
        // prepare permissions name
        $permissions = [
            $modelName.'.restore',
            $modelName.'.force_delete'
        ];

        return
            auth()->user()->hasAnyPermission($permissions)
            OR
            auth()->user()->hasRole('Super Administrátor')
            ? true
            : false;
    }
}
