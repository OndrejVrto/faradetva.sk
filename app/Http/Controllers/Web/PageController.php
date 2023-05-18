<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Contracts\View\Factory;
use App\Services\PagePropertiesService;
use Illuminate\Contracts\View\View as iView;
use App\Services\SEO\PageSeoPropertiesService;

class PageController extends Controller {
    private string $path = '';

    public function __invoke(string ...$param): iView|Factory {
        // create array of links
        $urls = collect($param)
                    ->whereNotNull()
                    ->map(function ($node): array {
                        $this->path .= '/' . $node;
                        return [
                            'title' => $node,
                            'url' => substr($this->path, 1)
                        ];
                    });

        $lastUrl = $urls->pop()['url'];
        $page = Cache::rememberForever(
            key: 'PAGE_'.Str::slug($lastUrl),
            callback: fn () => StaticPage::query()
                ->where('url', $lastUrl)
                ->with('picture', 'source', 'banners', 'faqs')
                ->firstOrFail()
        );
        $pageService = new PagePropertiesService();

        // check if last link exists in views.
        abort_if(!$page->active || !View::exists($pageService->fullRoute($page->route_name)), Response::HTTP_NOT_FOUND);

        // map data for SEO - BreadCrumb
        $pageChainBreadCrumb = $urls
            ->map(
                fn ($node) => Cache::rememberForever(
                    key: 'PAGE_NODE_'.Str::slug($node['url']),
                    callback: function () use ($node): array {
                        $item = StaticPage::query()
                            ->select('url', 'title', 'active')
                            ->where('url', $node['url'])
                            ->first();

                        return [
                            'title' => is_null($item) ? trans('messages.'.$node['title']) : e($item->title),
                            'url'   => is_null($item) ? null : e($item->url),
                        ];
                    }
                )
            )
            ->push([
                'title' => e($page->title),
                'url'   => e($page->url),
            ])
            ->toArray();

        $breadCrumb = Breadcrumbs::render('pages.others', true, $pageChainBreadCrumb)->render();

        // map data for SEO - Page Properties
        $pageData = $pageService->getStaticPageData($page, $breadCrumb);
        // dump($page, $pageData);

        // set SEO
        (new PageSeoPropertiesService())
            ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author, $pageData->image)
            ->setWebPageSchema($pageData)
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph()
            ->setBreadcrumbSchemaGraph($pageChainBreadCrumb);

        // counter of visits page
        $page->incrementVisit();

        return view($pageData->route, compact('pageData'));
    }
}
