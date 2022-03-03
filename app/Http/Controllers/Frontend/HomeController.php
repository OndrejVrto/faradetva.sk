<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Priest;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(): View  {
        $priests = Priest::whereActive(1)->with('media')->get();

        $countTestimonial = Testimonial::whereActive(1)->count();
        $testimonials = Testimonial::whereActive(1)->with('media')->get()->random(min($countTestimonial, 3));

        $countSliders = Slider::whereActive(1)->count();
        $sliders = Slider::whereActive(1)->with('media')->get()->random(min($countSliders, 3));
        $banner = Banner::with('media')->get()->random(1)->first();

        return view('frontend.home.index', compact(
            'priests',
            'testimonials',
            'sliders',
            'banner',
        ));
    }
}
