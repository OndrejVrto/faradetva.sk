<?php

namespace App\View\Components\Web\Sections;

use App\Models\Prayer;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SetSeoPropertiesService;

class Pray extends Component
{
    public $pray;

    public function __construct(
        public $link = null,
    ){
        $this->pray = $this->getPray();

        (new SetSeoPropertiesService())->setPictureSchema($this->pray);
    }

    public function render(): View|null {
        if (!is_null($this->pray)) {
            return view('components.web.sections.pray.index');
        }
        return null;
    }

    private function getPray(): ?array {
        // Get one ramdom Prayer
        $onePrayer = Prayer::query()
            ->select('slug')
            ->whereActive(1)
            ->inRandomOrder()
            ->limit(1)
            ->first();

        // Get all data Prayer to Cache
        return Cache::rememberForever('PICTURE_PRAYER_'.$onePrayer->slug, function () use ($onePrayer): array {
            return Prayer::query()
                ->whereSlug($onePrayer->slug)
                ->with('media', 'source')
                ->get()
                ->map(fn($e) => $this->mapOutput($e))
                ->first();
        });
    }

    private function mapOutput($prayer): array {
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
            'img-updated'       => $prayer->updated_at->toAtomString(),
            'img-width'         => 1920,
            'img-height'        => 800,

            'source_description'       => $prayer->source->source_description,
            'sourceArr' => [
                'source_source'        => $prayer->source->source_source,
                'source_source_url'    => $prayer->source->source_source_url,
                'source_author'        => $prayer->source->source_author,
                'source_author_url'    => $prayer->source->source_author_url,
                'source_license'       => $prayer->source->source_license,
                'source_license_url'   => $prayer->source->source_license_url,
            ],
        ];
    }
}
