<?php

namespace App\View\Components\Partials;

use Spatie\Image\Image;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PageCard extends Component
{
    public $pageCards = null;

    public function __construct(
        private ?int $countPages = null,
        private $routeStaticPages = null,
        public string $buttonText = 'Dozvedieť sa viac',
    ) {
        $listOfPages = prepareInput($routeStaticPages);

        $this->pageCards = StaticPage::query()
            ->whereActive(1)
            ->when($listOfPages, function($q) use($listOfPages) {
                return $q->whereIn('route_name', $listOfPages);
            }, function($q) use($countPages) {
                return $countPages > 0
                    ? $q->inRandomOrder()->limit($countPages)
                    : $q;
            })
            ->with('picture', 'source')
            ->get()
            ->map(function($page) {
                // TODO: remove example picture
                // dd($page);
                // $media = $page->picture[0];
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

                    // 'img-section-list'=> $media->getUrl('section-list'),
                    // 'img-description' => $page->source->source_description,
                    // 'img-height'      => Image::load( $media->getPath('section-list') )->getHeight(),
                    // 'img-width'       => Image::load( $media->getPath('section-list') )->getWidth(),

                    'img-picture-url' => isset($page->picture[0]) ? $page->picture[0]->getUrl('card') : 'http://via.placeholder.com/370x248',
                    'img-description' => isset($page->picture[0]) ? $page->source->source_description : 'EXAMPLE Description',
                    'img-description-crop' => isset($page->picture[0]) ? $page->source->source_description_crop : 'EXAMPLE Description',
                    'img-width'       => '370',
                    'img-height'      => '248',

                    // 'sourceArr' => [
                    //     'source_source'      => $page->source->source_source,
                    //     'source_source_url'  => $page->source->source_source_url,
                    //     'source_author'      => $page->source->source_author,
                    //     'source_author_url'  => $page->source->source_author_url,
                    //     'source_license'     => $page->source->source_license,
                    //     'source_license_url' => $page->source->source_license_url,
                    // ],
                ];
            });
    }

    public function render(): ?View {
        if (!is_null($this->pageCards)) {
            return view('components.partials.page-card.index');
        }

        return null;
    }
}
