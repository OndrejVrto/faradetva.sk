<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\StaticPage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

class HomeController extends Controller
{
    public function __invoke(): View  {

        $pageData = PagePropertiesService::virtualPageData('hlavna-stranka');

        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph();

        return view('web.home.index');
    }
}
