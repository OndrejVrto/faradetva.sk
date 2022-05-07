<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(): View  {

        // TODO:  add SEO META headers

        return view('web.home.index');
    }
}
