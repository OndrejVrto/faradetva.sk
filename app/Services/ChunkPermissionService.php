<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class ChunkPermissionService {
    public Collection $permission;

    public function __construct() {
        $this->permission = self::chunkByAlpha(Permission::orderBy('name')->get());
    }

    private static function chunkByAlpha(EloquentCollection $collection): Collection {
        return $collection->mapToGroups(function ($item): array {
            return self::isAlpha($item->name[0])
                        ? [strtoupper($item->name[0]) => $item]
                        : ['#' => $item];
        });
    }

    private static function isAlpha(mixed $toCheck): bool {
        return boolval(preg_match("/^[a-zA-Z]+$/", $toCheck));
    }
}
