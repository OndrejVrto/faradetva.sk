<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use Spatie\SiteSearch\Search;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function __invoke($search = null): View {
        $searchResults = $search ? Search::onIndex('FullSearchFaraDetva')
            ->query($search)
            ->limit(100)
            ->get() : null;

        return view('frontend.search.global', compact('searchResults'));
    }
}
