<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //todo: Delete francisco when development static pages is complete
    public function francisco() {
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
        return view('frontend.pages.about-us.patron-francisco-assisi', compact('banner'));
    }

    public function getPageFromUrl($pageUrlFirst, $pageUrlSecond = null, $pageUrlThird = null, $pageUrlFourth = null) {

        dump($pageUrlFirst, $pageUrlSecond, $pageUrlThird, $pageUrlFourth);
        return ;


        // dd($page);
        // $pageName = $request->path();
        //since your url does not begin with the page but with 'first',
        //best is to turn this into an array.
        // $parsedPath = explode("/",$page);
        // $data = [];

        // if( View::exists($pageName[0])) {
        //     return view($pageName[0], compact($data) );
        // } else {
        //     // abort(404);
        //     dd($pageName, $data );
        // }
    }
}
