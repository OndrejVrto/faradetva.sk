<?php

namespace App\View\Components\Partials;

use App\Models\StaticPage;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PageCard extends Component
{
    public $pageCards = null;

    public function __construct(
        public $routeStaticPages = null,
    ) {
        $listOfPages = prepareInput($routeStaticPages);

        if ($listOfPages) {
            $cacheName = getCacheName($listOfPages);

            $this->pageCards = Cache::rememberForever('PAGE_CARDS_'.$cacheName, function () use($listOfPages) {
                return StaticPage::whereIn('route_name',$listOfPages)->with('mediaOne', 'source')->get()->map(function($page) {
                    return  [
                        'id'              => $page->id,
                        'author'          => $page->author_page,
                        'description'     => $page->description_page,
                        'header'          => $page->header,
                        'keywords'        => $page->keywords,
                        'slug'            => $page->slug,
                        'teaser'          => $page->teaser,
                        'title'           => $page->title,
                        'url'             => $page->full_url,
                        'wikipedia'       => $page->wikipedia,

                        'img-section-list'=> $page->mediaOne->getUrl('section-list'),
                        'img-description' => $page->source->description,

                        'sourceArr' => [
                            'source'      => $page->source->source,
                            'source_url'  => $page->source->source_url,
                            'author'      => $page->source->author,
                            'author_url'  => $page->source->author_url,
                            'license'     => $page->source->license,
                            'license_url' => $page->source->license_url,
                        ],
                    ];
                });
            });
        }
    }

    public function render(): View {
        return view('components.partials.page-card.index');
    }
}
