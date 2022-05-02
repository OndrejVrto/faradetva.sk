<?php

namespace App\Policies\CleanupPolicies;

use Symfony\Component\Finder\SplFileInfo;
use Spatie\DirectoryCleanup\Policies\CleanupPolicy;

class MyCustomCleanupPolicy implements CleanupPolicy
{
    public function shouldDelete(SplFileInfo $file) : bool
    {
        $filesToKeep = ['.gitignore'];

        return ! in_array($file->getFilename(), $filesToKeep);
    }
}
