<?php

namespace App\View\Components\Partials;

use App\Models\StaticPage;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SetSeoPropertiesService;

class PageCard extends Component {
    public $pageCards = [];

    public function __construct(
        private ?int $countPages = null,
        private $routeStaticPages = null,
        public string $buttonText = 'Dozvedieť sa viac',
    ) {
        $this->getCards();
    }

    public function render(): ?View {
        if (!is_null($this->pageCards)) {
            foreach ($this->pageCards as $card) {
                (new SetSeoPropertiesService())->setPictureSchema($card);
            }
            return view('components.partials.page-card.index');
        }

        return null;
    }

    private function getCards() {
        // all cards
        if (is_null($this->countPages) and is_null($this->routeStaticPages)) {
            $this->pageCards = Cache::rememberForever('PAGE_CARD_ALL', function (): Collection {
                return StaticPage::query()
                    ->whereActive(1)
                    ->orderByDesc('virtual')
                    ->orderBy('url')
                    ->with('picture', 'source')
                    ->get()
                    ->map(fn ($page) => $this->mapOutput($page));
            });
            return;
        }

        $listOfPages = prepareInput($this->routeStaticPages);

        $randomCards = StaticPage::query()
            ->whereActive(1)
            ->whereVirtual(0)
            ->select('id')
            ->when($listOfPages, function ($q) use ($listOfPages) {
                return $q->whereIn('route_name', $listOfPages);
            }, function ($q) {
                return $this->countPages > 0
                    ? $q->inRandomOrder()->limit($this->countPages)
                    : $q;
            })
            ->get();

        foreach ($randomCards as $oneCard) {
            $this->pageCards[] = Cache::rememberForever('PAGE_CARD_'.$oneCard->id, function () use ($oneCard): array {
                return StaticPage::query()
                    ->whereId($oneCard->id)
                    ->with('picture', 'source')
                    ->get()
                    ->map(fn ($page) => $this->mapOutput($page))
                    ->first();
            });
        }
    }

    private function mapOutput($page): array {
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

            'img-title'              => $page->title,
            'img-updated'            => $page->updated_at->toAtomString(),
            'img-width'              => '370',
            'img-height'             => '248',
            'img-url'                => $media->getUrl('card'),  // 'http://via.placeholder.com/370x248',
            'img-mime'               => $media->mime_type,

            'img_thumbnail_url'      => $media->getUrl('crop-thumb'),
            'img_thumbnail_width'    => 100,
            'img_thumbnail_height'   => 50,

            'source_description'     => $page->source->source_description,
            'source_description-crop'=> $page->source->source_description_crop,
            'sourceArr' => [
                'source_source'      => $page->source->source_source,
                'source_source_url'  => $page->source->source_source_url,
                'source_author'      => $page->source->source_author,
                'source_author_url'  => $page->source->source_author_url,
                'source_license'     => $page->source->source_license,
                'source_license_url' => $page->source->source_license_url,
            ],
        ];
    }
}
