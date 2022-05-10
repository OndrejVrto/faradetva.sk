<?php

namespace App\Services\Health\Checks;

use Exception;
use Illuminate\Support\Facades\Http;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class CustomPingCheck extends Check
{
    public ?string $url = null;
    public ?string $failureMessage = null;
    public int $timeout = 1;

    public function url(string $url): self {
        $this->url = $url;
        return $this;
    }

    public function timeout(int $seconds): self  {
        $this->timeout = $seconds;
        return $this;
    }

    public function run(): Result {
        $this->label('health-results.ping.label');

        if (is_null($this->url)) {
            return Result::make()
                ->failed('health-results.ping.url_not_set');
        }

        try {
            if (! Http::timeout($this->timeout)->get($this->url)->successful()) {
                return $this->failedResult();
            }
        } catch (Exception $ex) {
            return $this->failedResult();
        }

        return Result::make()
            ->ok('health-results.ping.ok')
            ->shortSummary('health-results.ping.ok-short')
            ->meta([
                'name' => $this->getName(),
                'url'  => $this->url,
            ]);
    }

    protected function failedResult(): Result {
        return Result::make()
            ->failed('health-results.ping.failed')
            ->shortSummary('health-results.ping.failed-short')
            ->meta([
                'name' => $this->getName(),
                'url'  => $this->url,
            ]);
    }
}
