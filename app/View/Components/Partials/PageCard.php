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
        $this->pageCard = Cache::rememberForever('MINISTRY_'.$routeStaticPage, function () use($routeStaticPage) {
            return StaticPage::where('route_name',$routeStaticPage)->with('media', 'source')->get()->map(function($page) {
                return [
                    'id' => $page->id,
                    'teaser' => $page->teaser,
                    'title' => $page->title,
                    'url_page' => $page->full_url,
                    'desription' => $page->description_page,
                    'responsivePicture' => (string) $page
                                            ->getFirstMedia($page->media[0]->collection_name)
                                            ->img('section-list', [
                                                'class' => 'img-fluid',
                                                'alt' => $page->source->description,
                                                'title' => $page->title,
                                            ]),
                    // 'url_img'               => (string) $page->getFirstMediaUrl($page->media[0]->collection_name),
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
