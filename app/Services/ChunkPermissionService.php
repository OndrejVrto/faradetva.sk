<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class ChunkPermissionService {
    public $permission;

    public function __construct() {
        $this->permission = self::chunkByAlpha(Permission::orderBy('name')->get());
    }

    private static function chunkByAlpha(Collection $collection) {
        return $collection->mapToGroups(function ($item, $key) {
            return (self::isAlpha($item->name[0]) ? [strtoupper($item->name[0]) => $item] : ['#' => $item]);
        });
    }

    private static function isAlpha($toCheck) {
        return preg_match("/^[a-zA-Z]+$/", $toCheck);
    }
}
