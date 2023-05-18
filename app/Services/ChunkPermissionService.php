<?php declare(strict_types=1);

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
        return $collection->mapToGroups(fn ($item): array => self::isAlpha((string) $item->name[0])
                    ? [strtoupper((string) $item->name[0]) => $item]
                    : ['#' => $item]);
    }

    private static function isAlpha(string $toCheck): bool {
        return (bool) preg_match("/^[a-zA-Z]+$/", $toCheck);
    }
}
