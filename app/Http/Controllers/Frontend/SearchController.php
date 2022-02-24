<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

// use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function __invoke($search = null ): string {
        //! TODO: search in all pages
        //!  I do not know how!!
        return 'TODO -> Hľadať všade výraz: '. $search;
    }
}
