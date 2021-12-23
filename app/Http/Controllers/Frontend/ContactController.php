<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Priest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
	{
		$priests = Priest::whereActive(1)->with('media')->get();
		return view('contact.index', compact('priests'));
	}
}
