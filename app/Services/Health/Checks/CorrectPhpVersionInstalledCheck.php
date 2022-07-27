<?php

namespace App\Services\Health\Checks;

use Composer\Semver\Semver;
use Illuminate\Support\Arr;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class CorrectPhpVersionInstalledCheck extends Check {
    public function run(): Result {
        $name = 'health-results.php_version';
        $this->label("$name.label");

        $result = Result::make();

        $usedVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;

        try {
            $requiredVersion = $this->getRequiredPhpConstraint();
        } catch (FileNotFoundException $e) {
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
        $composer = json_decode((new Filesystem())->get(base_path('composer.json')), true);

        return Arr::get($composer, 'require.php');
    }
}
