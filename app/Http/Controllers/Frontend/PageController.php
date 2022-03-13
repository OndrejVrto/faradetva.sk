<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;

class PageController extends Controller
{
    public function __invoke(...$param) {
        $nodes = collect($param)->whereNotNull();
        $links = $this->getAllLinks($nodes);
        $pageData = last($links);

        if ($pageData AND View::exists($pageData['route'])) {
            $pageData['breadCrumb'] = (string) Breadcrumbs::render('pages.others', true, $links );

            return view($pageData['route'], compact('pageData'));
        }

        //** return 404 if page don't exist in DB **//
        abort(Response::HTTP_NOT_FOUND);
    }

    //** get Page Data for One nod in URL and Cache it **//
    private function getPageData(string $path): array|null {
        return Cache::rememberForever('PAGE_' . Str::slug($path), function () use($path): array|null {
            return StaticPage::whereUrl($path)->with('banners')->get()->map(function($page): array {
                return [
                    'id'          => $page->id,
                    'slug'        => $page->slug,
                    'title'       => $page->title,
                    'header'      => $page->header,
                    'author'      => $page->author,
                    'url'         => url($page->url),
                    'route'       => $this->getFullRoute($page->route_name),
                    'description' => $page->description,
                    'keywords'    => $page->keywords,
                    'banners'     => $page->banners->pluck('slug')->toArray(),
                ];
            })->first();
        });
    }

    //** create full route name **//
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;
        return (! Str::startsWith($route, '.')) ? $route : substr($route, 1);
    }

    //** complet page data for all nodes in URL link **//
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
}
