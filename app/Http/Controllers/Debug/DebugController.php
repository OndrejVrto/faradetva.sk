<?php

namespace App\Http\Controllers\Debug;

use App\Models\Priest;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class DebugController extends Controller
{


	public function index()
    {
		$priests = Priest::whereActive(1)->with('media')->get();
		$count = Testimonial::whereActive(1)->count();
		$testimonials = Testimonial::whereActive(1)->with('media')->get()->random(min($count, 3));

		return view('debug.all', compact(
			'priests',
			'testimonials',
		));
    }


}
