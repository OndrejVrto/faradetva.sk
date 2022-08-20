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
                    ->map(function ($node) {
                        $this->path .= '/' . $node;
                        return collect([
                            'title' => $node,
                            'url' => substr($this->path, 1)
                        ]);
                    });

        // check if last link exists in DB.
        $lastUrl = $urls->last()->get('url');
        $page = Cache::rememberForever(
            key: 'PAGE_'.Str::slug($lastUrl),
            callback: fn () => StaticPage::query()
                ->whereUrl($lastUrl)
                ->with('picture', 'source', 'banners', 'faqs')
                ->firstOrFail()
        );

        // check if last link exists in views.
        if (!$page->active || !View::exists(PagePropertiesService::fullRoute($page->route_name))) {
            abort(Response::HTTP_NOT_FOUND);
        }
        // map data for SEO - BreadCrumb
        $pageChainBreadCrumb = $urls
            ->map(
                fn ($node) => Cache::rememberForever(
                    key: 'PAGE_NODE_'.Str::slug($node->get('url')),
                    callback: function () use ($node) {
                        $item = StaticPage::query()
                            ->select('url', 'title', 'active')
                            ->whereUrl($node->get('url'))
                            ->first();

                        return [
                            'title' => property_exists($item, 'title') && $item->title !== null
                                ? e($item->title)
                                : trans('messages.'.$node->get('title')),
                            'url'   => property_exists($item, 'url') && $item->url !== null
                                ? e($item->url)
                                : null,
                        ];
                    }
                )
            )
            ->push([
                'title' => e($page->title),
                'url'   => e($page->url),
            ])
            ->toArray();

        // map data for SEO - Page Properties
        $pageData = PagePropertiesService::getStaticPageData($page);
        $pageData['breadCrumb'] = Breadcrumbs::render('pages.others', true, $pageChainBreadCrumb)->render();

        // set SEO
        (new PageSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph()
            ->setBreadcrumbSchemaGraph($pageChainBreadCrumb);

        return view($pageData['route'], compact('pageData'));
    }
}
