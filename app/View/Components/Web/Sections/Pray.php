<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use App\Models\Prayer;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SeoPropertiesService;

class Pray extends Component {
    public ?array $pray;

    public function __construct(
        public ?string $link = null,
    ) {
        $this->pray = $this->getPray();
    }

    public function render(): ?View {
        if (is_null($this->pray)) {
            return null;
        }

        (new SeoPropertiesService())->setPictureSchema($this->pray);
        return view('components.web.sections.pray.index');
    }

    private function getPray(): ?array {
        // Get one ramdom Prayer
        $onePrayer = Prayer::query()
            ->select('slug')
            ->activated()
            ->inRandomOrder()
            ->limit(1)
            ->first();

        // Get all data Prayer to Cache
        return Cache::rememberForever(
            key: 'PICTURE_PRAYER_'.$onePrayer?->slug,
            callback: fn () => Prayer::query()
                ->where('slug', $onePrayer?->slug)
                ->with('media', 'source')
                ->get()
                ->map(fn ($e) => $this->mapOutput($e))
                ->first()
        );
    }

    private function mapOutput(Prayer $prayer): array {
        return [
            'id'                => $prayer->id,
            'title'             => $prayer->title,
            'slug'              => $prayer->slug,

            'quote_row1'        => $prayer->quote_row1,
            'quote_row2'        => $prayer->quote_row2,
            'quote_author'      => $prayer->quote_author,
            'quote_link_url'    => $prayer->quote_link_url,
            'quote_link_text'   => $prayer->quote_link_text,

            'extra_small_image' => $prayer->getFirstMediaUrl('prayer', 'extra-small'),
            'small_image'       => $prayer->getFirstMediaUrl('prayer', 'small'),
            'medium_image'      => $prayer->getFirstMediaUrl('prayer', 'medium'),
            'large_image'       => $prayer->getFirstMediaUrl('prayer', 'large'),
            'extra_large_image' => $prayer->getFirstMediaUrl('prayer', 'extra-large'),

            'img-title'         => $prayer->title,
            'img-url'           => $prayer->getFirstMediaUrl('prayer', 'extra-large'),
            'img-mime'          => $prayer->mime_type,
            'img-updated'       => $prayer->updated_at?->toAtomString(),
            'img-width'         => 1920,
            'img-height'        => 800,

            'img_thumbnail_url'    => $prayer->getFirstMediaUrl('prayer', 'crop-thumb'),
            'img_thumbnail_width'  => 192,
            'img_thumbnail_height' => 80,

            'source_description'       => $prayer->source?->source_description,
            'sourceArr' => [
                'source_source'        => $prayer->source?->source_source,
                'source_source_url'    => $prayer->source?->source_source_url,
                'source_author'        => $prayer->source?->source_author,
                'source_author_url'    => $prayer->source?->source_author_url,
                'source_license'       => $prayer->source?->source_license,
                'source_license_url'   => $prayer->source?->source_license_url,
            ],
        ];
    }
}
