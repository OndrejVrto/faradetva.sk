<?php

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function getPageFromUrl($pageUrlFirst, $pageUrlSecond = null, $pageUrlThird = null, $pageUrlFourth = null) {
        $fullpath = collect([$pageUrlFirst, $pageUrlSecond, $pageUrlThird, $pageUrlFourth])
            ->whereNotNull()
            ->implode('/');

        $pageData = StaticPage::whereUrl($fullpath)->with('files.fileType', 'files.media')->firstOrFail();

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
