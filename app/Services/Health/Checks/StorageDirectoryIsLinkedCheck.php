<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Filesystem\Filesystem;

class StorageDirectoryIsLinkedCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.storage_link.label');

        $result = Result::make();

        try {
            (new Filesystem)->isDirectory(public_path('storage'));
            return $result->ok("health-results.storage_link.ok");
        } catch (\Exception $e) {
            return $result->failed("health-results.storage_link.failed");
        }
    }
}
