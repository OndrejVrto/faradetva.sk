<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use function config;
use App\Models\StaticPage;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Valuestore\Valuestore;

class StaticPagesCrawlerCheck extends Check
{
    private int $allPages = 0;

    private int $checkPages = 0;

    public function run(): Result {
        $this->label('health-results.static_pages.label');
        $result = Result::make();

        $lastCrawled = $this->getLastCrawledTime();

        if (!$lastCrawled) {
            return $result->failed('health-results.static_pages.no-crawled');
        }

        $this->procesPages();

        $result->shortSummary('health-results.static_pages.short')
            ->meta([
                'lastCrawlDate' => $lastCrawled->format('d.m.Y H:m'),
                'checkPages'    => $this->checkPages,
                'allPages'      => $this->allPages,
            ]);

        return $this->allPages === $this->checkPages
            ? $result->ok('health-results.static_pages.ok')
            : $result->failed('health-results.static_pages.failed');
    }

    private function procesPages(): void {
        $this->allPages = StaticPage::count();
        $this->checkPages = StaticPage::where('check_url', true)->count();
    }

    private function getLastCrawledTime(): ?Carbon {
        $valueStorage = Valuestore::make(config('farnost-detva.value_store'));

        if($valueStorage->has('CRAWLER.url_check')) {
            return Carbon::create($valueStorage->get('CRAWLER.url_check'));
        }

        return null;
    }
}
