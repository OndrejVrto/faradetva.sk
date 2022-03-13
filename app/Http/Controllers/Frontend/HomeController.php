<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(): View  {
        return view('frontend.home.index');
    }
}
