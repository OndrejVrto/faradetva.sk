<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Spatie\SiteSearch\Search;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

class SearchController extends Controller {
    public function __invoke(string $searchFrase = null): View|Factory {
        $searchResults = $searchFrase
            ? Search::onIndex('HTTPS_FaraDetva')
                ->query($searchFrase)
                ->limit(100)
                ->get()
            : null;

        // set SEO
        $pageData = PagePropertiesService::virtualPageData('globalne-vyhladavanie');
        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph();

        return view('web.global-search.index', compact('searchResults', 'searchFrase'));
    }
}
