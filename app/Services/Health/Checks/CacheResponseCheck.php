<?php

namespace App\Services\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class CacheResponseCheck extends Check {
    public function run(): Result {
        $name = 'health-results.cache_response';
        $this->label("$name.label");

        $result = Result::make();

        (bool) customConfig('config', 'responsecache.enabled')
            ? $result->notificationMessage("$name.ok")->ok()
            : $result->warning("$name.failed");

        return $result->meta([
            'driver' => config('responsecache.cache_store'),
            'time'   => gmdate("H:i:s", config('responsecache.cache_lifetime_in_seconds')),
        ]);
    }
}
