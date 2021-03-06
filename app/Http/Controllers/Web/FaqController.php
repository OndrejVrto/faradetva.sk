<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\Faq;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Services\PagePropertiesService;
use App\Services\PurifiAutolinkService;
use App\Services\SEO\SetSeoPropertiesService;

class FaqController extends Controller
{
    public function __invoke(): View  {
        $faqs = Cache::rememberForever('FAQ_ALL', function (): Collection|null {
            return Faq::query()
                ->with('staticPages')
                ->get()
                ->map(function ($faq) {
                    $pages = [];
                    foreach ($faq->staticPages as $page) {
                        $pages[] = [
                            'url'   => config('app.url').'/'.$page->url,
                            'title' => $page->title,
                        ];
                    }
                    return [
                        'id'           => $faq->id,
                        'question'     => $faq->question,
                        'answer-clean' => trim(preg_replace('!\s+!', ' ', preg_replace("/\r|\n/", " ", $faq->answer))),
                        'answer'       => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                        'pages'        => $pages,
                    ];
                });
        });

        $pageData = PagePropertiesService::virtualPageData('vsetky-otazky-a-odpovede');
        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph()
            ->setCompletFaqSeo($faqs);

        return view('web.faq.index', compact('faqs'));
    }
}
