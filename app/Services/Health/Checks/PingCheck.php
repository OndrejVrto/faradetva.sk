<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Exception;
use Illuminate\Support\Facades\Http;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class PingCheck extends Check {
    public ?string $url = null;
    public ?string $failureMessage = null;
    public int $timeout = 1;

    public function url(string $url): self {
        $this->url = $url;
        return $this;
    }

    public function timeout(int $seconds): self {
        $this->timeout = $seconds;
        return $this;
    }

    public function run(): Result {
        $name = 'health-results.ping';
        $this->label("$name.label");

        if (is_null($this->url)) {
            return Result::make()
                ->failed("$name.url_not_set");
        }

        try {
            if (! Http::timeout($this->timeout)->get($this->url)->successful()) {
                return $this->failedResult($name);
            }
        } catch (Exception) {
            return $this->failedResult($name);
        }

        return Result::make()
            ->notificationMessage("$name.ok")->ok()
            ->shortSummary("$name.ok-short")
            ->meta([
                'name' => $this->getName(),
                'url'  => $this->url,
            ]);
    }

    protected function failedResult(string $name): Result {
        return Result::make()
            ->failed("$name.failed")
            ->shortSummary("$name.failed-short")
            ->meta([
                'name' => $this->getName(),
                'url'  => $this->url,
            ]);
    }
}
