<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Priest;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    public function home() {
        $priests = Priest::whereActive(1)->with('media')->get();

        $countTestimonial = Testimonial::whereActive(1)->count();
        $testimonials = Testimonial::whereActive(1)->with('media')->get()->random(min($countTestimonial, 3));

        $countSliders = Slider::whereActive(1)->count();
        $sliders = Slider::whereActive(1)->with('media')->get()->random(min($countSliders, 3));
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();

        return view('frontend.debug.all', compact(
            'priests',
            'testimonials',
            'sliders',
            'banner',
        ));
    }

    public function contact() {
        $priests = Priest::whereActive(1)->with('media')->get();
        return view('frontend.contact.index', compact('priests'));
    }

    public function francisco() {
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
        return view('frontend.static.patron-francisco-assisi', compact('banner'));
    }
}
