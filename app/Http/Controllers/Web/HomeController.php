<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\PagePropertiesService;
use App\Services\SEO\PageSeoPropertiesService;

class HomeController extends Controller {
    public function __invoke(): View {
        $pageData = PagePropertiesService::virtualPageData('hlavna-stranka');

        if ($pageData) {
            (new PageSeoPropertiesService($pageData))
                ->setMetaTags()
                ->setWebPageSchema()
                ->setWebsiteSchemaGraph()
                ->setOrganisationSchemaGraph();
        }

        return view('web.home.index');
    }
}
