<?php

namespace App\View\Components\Frontend\Sections;

use App\Models\Prayer;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Pray extends Component
{
    public $pray;

    public function __construct(
        public $link = null,
    ) {
        $this->pray = $this->getPray();
        // dd($this->pray);
    }

    public function render(): View|null {
        if (!is_null($this->pray)) {
            return view('components.frontend.sections.pray.index');
        }
        return null;
    }

    private function getPray(): array {
        return Cache::remember('PRAY-random', now()->addHour(), function(): array {
            return Prayer::whereActive(1)
                ->with('media', 'source')
                ->get()
                ->random(1)
                ->map(function($img): array {
                    return [
                        'id'                => $img->id,
                        'title'             => $img->title,
                        'slug'              => $img->slug,

                        'quote_row1'        => $img->quote_row1,
                        'quote_row2'        => $img->quote_row2,
                        'quote_author'      => $img->quote_author,

                        'extra_small_image' => $img->getFirstMediaUrl('prayer', 'extra-small'),
                        'small_image'       => $img->getFirstMediaUrl('prayer', 'small'),
                        'medium_image'      => $img->getFirstMediaUrl('prayer', 'medium'),
                        'large_image'       => $img->getFirstMediaUrl('prayer', 'large'),
                        'extra_large_image' => $img->getFirstMediaUrl('prayer', 'extra-large'),

                        'description'       => $img->source->description,
                        'sourceArr' => [
                            'source'        => $img->source->source,
                            'source_url'    => $img->source->source_url,
                            'author'        => $img->source->author,
                            'author_url'    => $img->source->author_url,
                            'license'       => $img->source->license,
                            'license_url'   => $img->source->license_url,
                        ],
                    ];
            })->first();
        });
    }
}
