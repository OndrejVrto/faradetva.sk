<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\TwitterCard;

class PageController extends Controller
{
    public function __invoke(...$param) {

        $nodes = collect($param)->whereNotNull();
        $links = $this->getAllLinks($nodes);
        $pageData = last($links);

        if ($pageData AND Arr::exists($pageData, 'route') AND View::exists($pageData['route'])) {
            $pageData['breadCrumb'] = (string) Breadcrumbs::render('pages.others', true, $links);
            $pageData['breadCrumbJsonLd'] = (string) Breadcrumbs::view('breadcrumbs::json-ld', 'pages.others', $links);

            $this->setSeoMetaTags($pageData);

            return view($pageData['route'], compact('pageData'));
        }

        /** return 404 if page don't exist in DB **/
        abort(Response::HTTP_NOT_FOUND);
    }

    /** get Page Data for One nod in URL and Cache it **/
    private function getPageData(string $path): array|null {
        return Cache::rememberForever('PAGE_' . Str::slug($path), function () use($path): array|null {
            return StaticPage::whereUrl($path)->with('banners', 'faqs')->get()->map(function($page): array {
                return [
                    'id'          => $page->id,
                    'slug'        => $page->slug,
                    'title'       => $page->title,
                    'header'      => $page->header,
                    'author'      => $page->author_page,
                    'url'         => $page->full_url,
                    'route'       => $this->getFullRoute($page->route_name),
                    'description' => $page->description_page,
                    'keywords'    => $page->keywords,
                    'banners'     => $page->banners->pluck('slug')->toArray(),
                    'faqs'        => $page->faqs->pluck('slug')->toArray(),
                ];
            })->first();
        });
    }

    /** create full route name **/
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;
        return (! Str::startsWith($route, '.')) ? $route : substr($route, 1);
    }

    /** complet page data for all nodes in URL link **/
    private function getAllLinks(Collection $node): array {
        $path = '';
        foreach ($node->toArray() as $key => $value) {
            $path .= '/' . $value;
            $arr[$key] = $this->getPageData(substr($path, 1)) ?? [
                'title' => Str::ucfirst(str_replace('-', ' ', (string) $value)),
                'url' => null
            ];
        }
        return $arr;
    }

    private function setSeoMetaTags(array $pageData): void {
        // TODO: meta tags
        SEOMeta::setTitle($pageData['title']);
        SEOMeta::setDescription($pageData['description']);
        SEOMeta::addKeyword($pageData['keywords']);
        SEOMeta::addMeta('author', $pageData['author'], 'name');

        OpenGraph::setDescription($pageData['description']);
        OpenGraph::setTitle($pageData['title']);
        OpenGraph::addImage('TODO: URL', [
            'alt' => 'TODO:',
            'type' => 'TODO: mime type',
            'width' => 'TODO:',
            'height' => 'TODO:',
            'secure_url' => 'TODO:',
        ]);

        TwitterCard::setTitle($pageData['title']);
        TwitterCard::setDescription($pageData['description']);
        TwitterCard::setImage('TODO: https://codecasts.com.br/img/logo.jpg');
        TwitterCard::addValue('image:alt', 'TODO: ALT');

        JsonLd::setTitle($pageData['title']);
        JsonLd::setDescription($pageData['description']);
        JsonLd::addImage('TODO: https://codecasts.com.br/img/logo.jpg');
    }
}
