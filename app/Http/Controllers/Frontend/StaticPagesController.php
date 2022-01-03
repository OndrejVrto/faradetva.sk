<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\Priest;

class StaticPagesController extends Controller
{
    public function contact()
	{
		$priests = Priest::whereActive(1)->with('media')->get();
		return view('frontend.contact.index', compact('priests'));
	}

	public function francisco()
	{
		$banner = Banner::whereActive(1)->with('media')->get()->random(1)->first();
		return view('frontend.static.patron-francisco-assisi', compact('banner'));
	}
}
