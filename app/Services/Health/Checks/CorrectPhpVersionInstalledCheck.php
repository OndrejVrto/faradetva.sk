<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Illuminate\Support\Arr;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Filesystem\Filesystem;
use RectorPrefix202208\Composer\Semver\Semver;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class CorrectPhpVersionInstalledCheck extends Check {
    public function run(): Result {
        $name = 'health-results.php_version';
        $this->label("$name.label");

        $result = Result::make();

        $usedVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;

        try {
            $requiredVersion = $this->getRequiredPhpConstraint();
        } catch (FileNotFoundException) {
            return $result->failed("$name.crash_composer");
        }

        Semver::satisfies($usedVersion, $requiredVersion)
            ? $result->notificationMessage("$name.ok")->ok()
            : $result->failed("$name.failed");

        return $result->meta([
                'required' => $requiredVersion,
                'used'     => $usedVersion,
            ]);
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getRequiredPhpConstraint() {
        $composer = json_decode((new Filesystem())->get(base_path('composer.json')), true, 512, JSON_THROW_ON_ERROR);

        return Arr::get($composer, 'require.php');
    }
}
