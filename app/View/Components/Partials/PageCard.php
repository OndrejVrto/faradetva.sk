<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use App\Models\StaticPage;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SeoPropertiesService;
use Illuminate\Database\Eloquent\Collection;

class PageCard extends Component {
    public array $pageCards;

    public function __construct(
        private readonly ?int $countPages = null,
        private readonly null|array|string $routeStaticPages = null,
        public string $buttonText = 'Dozvedieť sa viac',
    ) {
        $this->pageCards = (is_null($countPages) && is_null($routeStaticPages))
            ? $this->getAllCards()
            : $this->getCustomCards($this->getListPages());
    }

    public function render(): ?View {
        if (empty($this->pageCards)) {
            return null;
        }

        foreach ($this->pageCards as $card) {
            (new SeoPropertiesService())->setPictureSchema($card);
        }

        return view('components.partials.page-card.index');
    }

    private function getListPages(): Collection {
        $listOfPages = prepareInput($this->routeStaticPages);

        return StaticPage::query()
            ->select('id')
            ->activated()
            ->notVirtual()
            ->when(
                $listOfPages,
                fn ($query) => $query->whereIn('route_name', $listOfPages),
                fn ($query) => $this->countPages > 0
                    ? $query->inRandomOrder()->limit($this->countPages)
                    : $query
            )
            ->get();
    }

    private function getAllCards(): array {
        return Cache::rememberForever(
            key: 'PAGE_CARD_ALL',
            callback: fn (): array => StaticPage::query()
                ->activated()
                ->inRandomOrder()
                // ->orderByDesc('virtual')
                // ->orderBy('url')
                ->with('picture', 'source')
                ->get()
                ->map(fn ($page) => $this->mapOutput($page))
                ->toArray()
        );
    }

    private function getCustomCards(Collection $listOfCards): array {
        $cards = [];
        foreach ($listOfCards as $oneCard) {
            $cards[] = Cache::rememberForever(
                key: 'PAGE_CARD_'.$oneCard->id,
                callback: fn () => StaticPage::query()
                    ->where('id', $oneCard->id)
                    ->with('picture', 'source')
                    ->get()
                    ->map(fn ($page) => $this->mapOutput($page))
                    ->first()
            );
        }
        return $cards;
    }

    private function mapOutput(StaticPage $page): array {
        $media = $page->picture[0] ?? null;

        if (null !== $media) {
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
                'img-updated'            => $page->updated_at?->toAtomString(),
                'img-width'              => '370',
                'img-height'             => '248',
                'img-url'                => $media?->getUrl('card'), // 'http://via.placeholder.com/370x248'
                'img-mime'               => $media?->mime_type,

                'img_thumbnail_url'      => $media?->getUrl('crop-thumb'),
                'img_thumbnail_width'    => 100,
                'img_thumbnail_height'   => 50,

                'source_description'     => $page->source?->source_description,
                'source_description-crop'=> $page->source?->source_description_crop,
                'sourceArr' => [
                    'source_source'      => $page->source?->source_source,
                    'source_source_url'  => $page->source?->source_source_url,
                    'source_author'      => $page->source?->source_author,
                    'source_author_url'  => $page->source?->source_author_url,
                    'source_license'     => $page->source?->source_license,
                    'source_license_url' => $page->source?->source_license_url,
                ],
            ];
        } else {
            //TODO: zmazať po vývoji
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
                'img-updated'            => $page->updated_at?->toAtomString(),
                'img-width'              => '370',
                'img-height'             => '248',
                'img-url'                => 'http://via.placeholder.com/370x248', // 'http://via.placeholder.com/370x248'
                'img-mime'               => 'image/png',

                'img_thumbnail_url'      => 'http://via.placeholder.com/100x50',
                'img_thumbnail_width'    => 100,
                'img_thumbnail_height'   => 50,

                'source_description'     => 'example picture description',
                'source_description-crop'=> 'example picture description',
                'sourceArr' => [
                    'source_source'      => 'example source',
                    'source_source_url'  => 'http://source.example.com',
                    'source_author'      => 'example author',
                    'source_author_url'  => 'http://author.example.com',
                    'source_license'     => 'example license',
                    'source_license_url' => 'http://license.example.com'
                ],
            ];
        }
    }
}
