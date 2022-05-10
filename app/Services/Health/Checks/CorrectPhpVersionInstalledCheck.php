<?php

namespace App\Services\Health\Checks;

use Composer\Semver\Semver;
use Illuminate\Support\Arr;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class CorrectPhpVersionInstalledCheck extends Check
{
    public function run(): Result {
        $this->label('health-results.php_version.label');

        $result = Result::make();

        $usedVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;

        try {
            $requiredVersion = $this->getRequiredPhpConstraint();
        } catch (FileNotFoundException $e) {
            return $result->failed("health-results.php_version.crash_composer");
        }

        Semver::satisfies($usedVersion, $requiredVersion )
            ? $result->ok("health-results.php_version.ok")
            : $result->failed("health-results.php_version.failed");

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
        $composer = json_decode((new Filesystem)->get(base_path('composer.json')), true);

        return Arr::get($composer, 'require.php');
    }
}
