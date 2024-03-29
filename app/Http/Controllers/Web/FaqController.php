<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Models\Faq;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Services\PagePropertiesService;
use App\Services\PurifyAutolinkService;
use App\Services\SEO\SeoPropertiesService;
use App\Services\SEO\PageSeoPropertiesService;

class FaqController extends Controller {
    public function __invoke(): View {
        $faqs = Cache::rememberForever(
            key: 'FAQ_ALL',
            callback: fn (): Collection => Faq::query()
                ->with('staticPages')
                ->get()
                ->map(function ($faq): array {
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
                        'answer-clean' => trim((string) preg_replace(["!\s+!", "/\r|\n/"], [' ', ' '], $faq->answer ?? '')),
                        'answer'       => (new PurifyAutolinkService())->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                        'pages'        => $pages,
                    ];
                })
        );

        $pageData = PagePropertiesService::virtualPageData('vsetky-otazky-a-odpovede');
        if ($pageData !== null) {
            (new PageSeoPropertiesService())
                ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author, $pageData->image)
                ->setWebPageSchema($pageData)
                ->setWebsiteSchemaGraph()
                ->setOrganisationSchemaGraph();
        }
        (new SeoPropertiesService())->setCompletFaqSeo($faqs);

        return view('web.faq.index', compact('faqs'));
    }
}
