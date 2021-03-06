<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

class PageController extends Controller
{
    private $path = '';

    public function __invoke(...$param) {

        // create array of links
        $urls = collect($param)
                    ->whereNotNull()
                    ->map(function($node) {
                        $this->path .= '/' . $node;
                        return collect([
                            'title' => $node,
                            'url' => substr($this->path, 1)
                        ]);
                    });

        // check if last link exists in DB.
        $lastUrl = $urls->pop()->get('url');
        $page = Cache::rememberForever('PAGE_' . Str::slug($lastUrl), function () use($lastUrl) {
                    return StaticPage::query()
                        ->whereUrl($lastUrl)
                        ->with('picture', 'source', 'banners', 'faqs')
                        ->firstOrFail();
        });

        // check if last link exists in views.
        if (!$page->active OR !View::exists(PagePropertiesService::fullRoute($page->route_name))) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // map data for SEO - BreadCrumb
        $pageChainBreadCrumb = $urls
            ->map(function($node){
                return Cache::rememberForever('PAGE_NODE_'.Str::slug($node), function () use($node) {
                    $item = StaticPage::query()
                        ->select('url', 'title', 'active')
                        ->whereUrl($node->get('url'))
                        ->first();

                    return [
                        'title' => isset($item->title) ? e($item->title) : trans('messages.'.$node->get('title')),
                        'url'   => isset($item->url) ? e($item->url) : null,
                    ];
                });
            })
            ->push([
                'title' => e($page->title),
                'url'   => e($page->url),
            ])
            ->toArray();

        // map data for SEO - Page Properties
        $pageData = PagePropertiesService::getStaticPageData($page);
        $pageData['breadCrumb'] = (string) Breadcrumbs::render('pages.others', true, $pageChainBreadCrumb);

        // set SEO
        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph()
            ->setBreadcrumbSchemaGraph($pageChainBreadCrumb);

        return view($pageData['route'], compact('pageData'));
    }

}

