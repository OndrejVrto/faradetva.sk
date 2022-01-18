<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function __invoke($search = null ) {
        //! TODO: search in all pages
        //!  I do not know how!!
        return 'TODO -> Hľadať všade výraz: '. $search;
    }
}
