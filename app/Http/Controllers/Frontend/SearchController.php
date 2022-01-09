<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchAll($search = null ) {
        // TODO: search in all pages
        return 'Hľadať všade: '. $search;
    }

    public function searchNews($search = null) {
        // TODO: search in news
        return 'Hľadať v správach: '. $search;
    }
}
