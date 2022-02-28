<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function __invoke(
        $pageUrlFirst,
        $pageUrlSecond = null,
        $pageUrlThird = null,
        $pageUrlFourth = null
    ) {
        $fullpath = collect([$pageUrlFirst, $pageUrlSecond, $pageUrlThird, $pageUrlFourth])
            ->whereNotNull()
            ->implode('/');

        $pageData = $this->getPageData($fullpath);

        if ($pageData AND View::exists($pageData['route'])) {
            return view($pageData['route'], compact('pageData'));
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    private function getPageData(string $fullpath): array|null {
        return Cache::rememberForever('PAGE_' . Str::slug($fullpath), function () use($fullpath): array|null {
            return StaticPage::whereUrl($fullpath)->get()
                ->map(function($page): array {
                return [
                    'id'          => $page->id,
                    'slug'        => $page->slug,
                    'title'       => $page->title,
                    'header'      => $page->header,
                    'author'      => $page->author,
                    'url'         => $page->url,
                    'route'       => $this->getFullRoute($page->route_name),
                    'description' => $page->description,
                    'keywords'    => $page->keywords,
                ];
            })->first();
        });
    }

    //** create full route name *//
    private function getFullRoute(string $route_name): string {
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $route_name;
        return (! Str::startsWith($route, '.')) ? $route : substr($route, 1);
    }
}
