<?php

declare(strict_types=1);

namespace App\Policies\CleanupPolicies;

use Symfony\Component\Finder\SplFileInfo;
use Spatie\DirectoryCleanup\Policies\CleanupPolicy;

class MyCustomCleanupPolicy implements CleanupPolicy {
    public function shouldDelete(SplFileInfo $file): bool {
        $filesToKeep = ['.gitignore', 'robots.txt'];

        return ! in_array($file->getFilename(), $filesToKeep);
    }
}
