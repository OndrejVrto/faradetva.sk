<?php declare(strict_types=1);

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Filesystem\Filesystem;

class StorageDirectoryIsLinkedCheck extends Check {
    public function run(): Result {
        $name = 'health-results.storage_link';
        $this->label("$name.label");

        try {
            (new Filesystem())->isDirectory(public_path('storage'));
            return Result::make("$name.ok");
        } catch (\Exception) {
            return Result::make()->failed("$name.failed");
        }
    }
}
