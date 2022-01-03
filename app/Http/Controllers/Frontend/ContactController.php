<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Priest;

class ContactController extends Controller
{
    public function index()
	{
		$priests = Priest::whereActive(1)->with('media')->get();
		return view('frontend.contact.index', compact('priests'));
	}
}
