<?php

namespace App\Http\Controllers\Frontend;

use App\Models\StaticPage;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getPageFromUrl($pageUrlFirst, $pageUrlSecond = null, $pageUrlThird = null, $pageUrlFourth = null) {
        $fullpath = collect([$pageUrlFirst, $pageUrlSecond, $pageUrlThird, $pageUrlFourth])
            ->whereNotNull()
            ->implode('/');

        $pageData = StaticPage::whereUrl($fullpath)->with('files.fileType', 'files.media')->firstOrFail();

        //* create full path to template
        $route = config('preppend_route_static_pages','frontend.pages') . '.' . $pageData->route_name;

        if (View::exists($route)) {
            return view($route, compact($pageData) );
        } else {
            abort(404);
        }
    }
}
