<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Spatie\SiteSearch\Search;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Services\PagePropertiesService;
use App\Services\SEO\PageSeoPropertiesService;

class SearchController extends Controller {
    public function __invoke(string $searchFrase = null): View|Factory {
        $searchResults = $searchFrase
            ? Search::onIndex('HTTPS_FaraDetva')
                ->query($searchFrase)
                ->limit(100)
                ->get()
            : null;

        // set SEO
        $pageData = (new PagePropertiesService())->virtualPageData('globalne-vyhladavanie');
        if ($pageData !== null) {
            (new PageSeoPropertiesService())
                ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author, $pageData->image)
                ->setWebPageSchema($pageData)
                ->setWebsiteSchemaGraph()
                ->setOrganisationSchemaGraph();
        }

        return view('web.global-search.index', compact('searchResults', 'searchFrase'));
    }
}
