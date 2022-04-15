<?php

namespace App\View\Components\Partials;

use App\Models\StaticPage;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PageCard extends Component
{
    public $pageCard;

    public function __construct(
        public string $routeStaticPage,
        public string $delay
    ) {
        $this->pageCard = Cache::rememberForever('PAGE_CARD_'.$routeStaticPage, function () use($routeStaticPage) {
            return StaticPage::where('route_name',$routeStaticPage)->with('mediaOne', 'source')->get()->map(function($page) {
                $colectionName = $page->media[0]->collection_name;
                $media = $page->getFirstMedia($colectionName);

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

                    'img-section-list'=> $media->getUrl('section-list'),
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
            })->first();
        });
    }

    public function render(): View {
        return view('components.partials.page-card.index');
    }
}
