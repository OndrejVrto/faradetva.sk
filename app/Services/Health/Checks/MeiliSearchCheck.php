<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class MeiliSearchCheck extends Check {
    public int $timeout = 1;
    public string $url = 'http://127.0.0.1:7700/health';

    public function timeout(int $seconds): self {
        $this->timeout = $seconds;
        return $this;
    }

    public function url(string $url): self {
        $this->url = $url;
        return $this;
    }

    public function run(): Result {
        $name = 'health-results.meili-search';
        $this->label("$name.label");

        try {
            $response = Http::timeout($this->timeout)->asJson()->get($this->url);
        } catch (Exception) {
            return Result::make()
                ->failed("$name.unreachable")
                ->shortSummary("$name.unreachable-short")
                ->meta(['url' => $this->url]);
        }

        /** @phpstan-ignore-next-line */
        if (! $response) {
            return Result::make()
                ->failed("$name.not-respond")
                ->shortSummary("$name.not-respond-short")
                ->meta(['url' => $this->url]);
        }

        if (! Arr::has($response, 'status')) {
            return Result::make()
                ->failed("$name.invalid-response")
                ->shortSummary("$name.invalid-response-short");
        }

        $status = Arr::get($response, 'status');

        if ($status !== 'available') {
            return Result::make()
                ->failed("$name.available")
                ->shortSummary("$name.available-short")
                ->meta(['status' => ucfirst($status)]);
        }

        return Result::make()
            ->notificationMessage("$name.ok")->ok()
            ->shortSummary("$name.ok-short")
            ->meta(['status' => ucfirst($status)]);
    }
}
