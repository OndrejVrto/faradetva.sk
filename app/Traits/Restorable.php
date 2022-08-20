<?php declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

trait Restorable {
    use SoftDeletes;

    public function scopeArchive(Builder $query, Request $request, string $modelName): Builder {
        return $query
            ->when($request->has('only-deleted') && $this->canRestore($modelName), function ($query) {
                $query->onlyTrashed();
            })
            ->when($request->has('with-deleted') && $this->canRestore($modelName), function ($query) {
                $query->withTrashed();
            });
    }

    private function canRestore(string $modelName): bool {
        // prepare permissions name
        $permissions = [
            $modelName.'.restore',
            $modelName.'.force_delete'
        ];

        return
            auth()->user()?->hasAnyPermission($permissions) || (bool) auth()->user()?->hasRole('Super Administrátor');
    }
}
