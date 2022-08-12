<?php

declare(strict_types=1);

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use App\Models\StaticPage;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class StaticPagesCrawlerCheck extends Check {
    private int $allPages = 0;

    private int $checkPages = 0;

    public function run(): Result {
        $name = 'health-results.static_pages';
        $this->label("$name.label");

        $result = Result::make();

        $lastCrawledTime = customConfig('crawler', 'CRAWLER.url_check', null);

        if (!$lastCrawledTime) {
            return $result->failed("$name.no-crawled");
        }

        $this->procesPages();

        $result->shortSummary("$name.short")
            ->meta([
                'lastCrawlDate' => Carbon::parse($lastCrawledTime)->format('d.m.Y H:m'),
                'checkPages'    => $this->checkPages,
                'allPages'      => $this->allPages,
            ]);

        return $this->allPages === $this->checkPages
            ? $result->notificationMessage("$name.ok")->ok()
            : $result->failed("$name.failed");
    }

    private function procesPages(): void {
        $this->allPages = StaticPage::count();
        $this->checkPages = StaticPage::where('check_url', true)->count();
    }
}
