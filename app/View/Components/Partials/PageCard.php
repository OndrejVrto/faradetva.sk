<?php

namespace App\View\Components\Partials;

use Spatie\Image\Image;
use App\Models\StaticPage;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PageCard extends Component
{
    public $pageCards = null;

    public function __construct(
        public $routeStaticPages = null,
    ) {
        $listOfPages = prepareInput($routeStaticPages);

        if ($listOfPages) {
            $this->pageCards = StaticPage::query()
                ->whereIn('route_name',$listOfPages)
                ->with('picture', 'source')
                ->get()
                ->map(function($page) {
                    $media = $page->picture[0];
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
                        'img-description' => $page->source->source_description,
                        'img-height'      => Image::load( $media->getPath('section-list') )->getHeight(),
                        'img-width'       => Image::load( $media->getPath('section-list') )->getWidth(),

                        'sourceArr' => [
                            'source_source'      => $page->source->source_source,
                            'source_source_url'  => $page->source->source_source_url,
                            'source_author'      => $page->source->source_author,
                            'source_author_url'  => $page->source->source_author_url,
                            'source_license'     => $page->source->source_license,
                            'source_license_url' => $page->source->source_license_url,
                        ],
                    ];
                });
        }
    }

    public function render(): View {
        return view('components.partials.page-card.index');
    }
}
