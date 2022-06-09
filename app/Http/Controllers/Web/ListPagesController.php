<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

class ListPagesController extends Controller
{
    public function __invoke(Request $request): View {

        $pages = StaticPage::query()->orderBy('url')->get();

        $pageData = PagePropertiesService::virtualPageData('zoznam-vsetkych-stranok');
        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph();

        return view('web.list-all-pages.index', compact('pages'));
    }
}
