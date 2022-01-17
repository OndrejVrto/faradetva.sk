<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Priest;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __invoke() {
        $banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
        $priests = Priest::whereActive(1)->with('media')->get();

        return view('frontend.contact.index', compact('priests', 'banner'));
    }
}
