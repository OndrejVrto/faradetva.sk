<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Priest;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function home() {
        $priests = Priest::whereActive(1)->with('media')->get();

        $countTestimonial = Testimonial::whereActive(1)->count();
        $testimonials = Testimonial::whereActive(1)->with('media')->get()->random(min($countTestimonial, 3));

        $countSliders = Slider::whereActive(1)->count();
        $sliders = Slider::whereActive(1)->with('media')->get()->random(min($countSliders, 3));
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();

        return view('frontend.home.index', compact(
            'priests',
            'testimonials',
            'sliders',
            'banner',
        ));
    }

    public function contact() {
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
        $priests = Priest::whereActive(1)->with('media')->get();
        return view('frontend.contact.index', compact('priests', 'banner'));
    }

    public function francisco() {
        // TODO: eloquent best querry
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
        return view('frontend.static.patron-francisco-assisi', compact('banner'));
    }

    public function getPageByName($pageName) {
        // dd($page);
        // $pageName = $request->path();
        //since your url does not begin with the page but with 'first',
        //best is to turn this into an array.
        // $parsedPath = explode("/",$page);
        $data = [];

        if( View::exists($pageName[0])) {
            return view($pageName[0], compact($data) );
        } else {
            // abort(404);
            dd($pageName, $data );
        }
    }
}
