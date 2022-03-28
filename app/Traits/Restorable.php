<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait Restorable
{
    public function scopeArchive(Builder $query, Request $request, string $modelName) {
        return $query
            ->when($request->has('only-deleted') AND $this->canRestore($modelName), function ($query) {
                $query->onlyTrashed();
            })
            ->when($request->has('with-deleted') AND $this->canRestore($modelName), function ($query) {
                $query->withTrashed();
            });
        }

    private function canRestore(string $modelName): bool
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
