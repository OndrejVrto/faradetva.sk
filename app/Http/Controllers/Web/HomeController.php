<?php declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\PagePropertiesService;
use App\Services\SEO\PageSeoPropertiesService;

class HomeController extends Controller {
    public function __invoke(): View {
        $pageData = PagePropertiesService::virtualPageData('hlavna-stranka');
        // dump($pageData);
        if ($pageData !== null) {
            (new PageSeoPropertiesService())
                ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author, $pageData->image)
                ->setWebPageSchema($pageData)
                ->setWebsiteSchemaGraph()
                ->setOrganisationSchemaGraph();
        }

        return view('web.home.index');
    }
}
