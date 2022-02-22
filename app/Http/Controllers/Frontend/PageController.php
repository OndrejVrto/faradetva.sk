<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

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

        $pageData = StaticPage::whereUrl($fullpath)->firstOrFail();

        //* create full path to template
        $route = config('farnost-detva.preppend_route_static_pages','frontend') . '.' . $pageData->route_name;
        //* remove first dot
        $routeClear = (! Str::startsWith($route, '.')) ? $route : substr($route, 1);

        if (View::exists($routeClear)) {
            return view($routeClear, compact('pageData') );
        } else {
            abort(404);
        }
    }
}
