<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use Spatie\SiteSearch\Search;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function __invoke($searchFrase = null): View {
        $searchResults = $searchFrase
            ? Search::onIndex('HTTPS_FaraDetva')
                ->query($searchFrase)
                ->limit(100)
                ->get()
            : null;

        // TODO:  add SEO META headers

        return view('web.global-search.index', compact('searchResults', 'searchFrase'));
    }
}
