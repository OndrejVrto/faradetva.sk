<?php

declare(strict_types=1);

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\News;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateSitemapJob implements ShouldQueue {
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function handle(): void {
        $sitemap = Sitemap::create()
            ->add(
                Url::create('/')
                    ->setLastModificationDate(Carbon::createFromTimestamp(customConfig('crawler')->get('___LAST_MODIFIED')))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(1.0)
            );

        News::visible()->get()->each(function (News $news) use ($sitemap) {
            // articles olds as year
            if ($news->updated_at < now()->subYear()) {
                $sitemap->add(
                    Url::create("/clanok/{$news->slug}")
                        ->setLastModificationDate($news->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                        ->setPriority(0.2)
                );
            // articles olds as 3 months
            } elseif ($news->updated_at < now()->subQuarter()) {
                $sitemap->add(
                    Url::create("/clanok/{$news->slug}")
                        ->setLastModificationDate($news->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                        ->setPriority(0.5)
                );
            // articles olds as 1 week
            } elseif ($news->updated_at < now()->subWeek()) {
                $sitemap->add(
                    Url::create("/clanok/{$news->slug}")
                        ->setLastModificationDate($news->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.6)
                );
            // new articles
            } else {
                $sitemap->add(
                    Url::create("/clanok/{$news->slug}")
                        ->setLastModificationDate($news->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.7)
                );
            }
        });

        StaticPage::query()
            ->whereActive(1)
            ->whereVirtual(0)
            ->each(function (StaticPage $page) use ($sitemap) {
                if (Str::contains($page->slug, 'oznamy')) {
                    $sitemap->add(
                        Url::create("/{$page->url}")
                            ->setLastModificationDate($page->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                            ->setPriority(1.0)
                    );
                } else {
                    $sitemap->add(
                        Url::create("/{$page->url}")
                        ->setLastModificationDate($page->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
                        ->setPriority(0.3)
                    );
                }
            });

        $sitemap->add(
            Url::create('/otazky-a-odpovede')
                ->setLastModificationDate(Faq::select('updated_at')->orderBy('updated_at', 'DESC')->first()->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1)
        );

        $sitemap->writeToFile(public_path('sitemap.xml'));

        customConfig('crawler')->put('CRAWLER.sitemap', Carbon::now()->toISOString());
    }
}
