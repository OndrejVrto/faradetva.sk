<?php

namespace App\View\Components\Web\Sections;

use App\Models\Prayer;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Pray extends Component
{
    public $pray;

    public function __construct(
        public $link = null,
    ) {
        $this->pray = $this->getPray();
    }

    public function render(): View|null {
        if (!is_null($this->pray)) {
            return view('components.web.sections.pray.index');
        }
        return null;
    }

    private function getPray(): array {
        return Prayer::query()
            ->whereActive(1)
            ->with('media', 'source')
            ->get()
            ->shuffle()
            ->map(function($img): array {
                if($img->getFirstMedia()){
                    return [
                        'id'                => $img->id,
                        'title'             => $img->title,
                        'slug'              => $img->slug,

                        'quote_row1'        => $img->quote_row1,
                        'quote_row2'        => $img->quote_row2,
                        'quote_author'      => $img->quote_author,
                        'quote_link_url'    => $img->quote_link_url,
                        'quote_link_text'   => $img->quote_link_text,

                        'extra_small_image' => $img->getFirstMediaUrl('prayer', 'extra-small'),
                        'small_image'       => $img->getFirstMediaUrl('prayer', 'small'),
                        'medium_image'      => $img->getFirstMediaUrl('prayer', 'medium'),
                        'large_image'       => $img->getFirstMediaUrl('prayer', 'large'),
                        'extra_large_image' => $img->getFirstMediaUrl('prayer', 'extra-large'),

                        'source_description'       => $img->source->source_description,
                        'sourceArr' => [
                            'source_source'        => $img->source->source_source,
                            'source_source_url'    => $img->source->source_source_url,
                            'source_author'        => $img->source->source_author,
                            'source_author_url'    => $img->source->source_author_url,
                            'source_license'       => $img->source->source_license,
                            'source_license_url'   => $img->source->source_license_url,
                        ],
                    ];
                } else {
                    return [
                        'id'                => $img->id,
                        'title'             => $img->title,
                        'slug'              => $img->slug,

                        'quote_row1'        => $img->quote_row1,
                        'quote_row2'        => $img->quote_row2,
                        'quote_author'      => $img->quote_author,
                        'quote_link_url'    => $img->quote_link_url,
                        'quote_link_text'   => $img->quote_link_text,

                        'extra_small_image' => 'http://via.placeholder.com/720x300',
                        'small_image'       => 'http://via.placeholder.com/960x400',
                        'medium_image'      => 'http://via.placeholder.com/1200x500',
                        'large_image'       => 'http://via.placeholder.com/1440x600',
                        'extra_large_image' => 'http://via.placeholder.com/1920x800',

                        'source_description'       => 'example picture description',
                        'sourceArr' => [
                            'source_source'        => 'example source',
                            'source_source_url'    => 'http://source.example.com',
                            'source_author'        => 'example author',
                            'source_author_url'    => 'http://author.example.com',
                            'source_license'       => 'example license',
                            'source_license_url'   => 'http://license.example.com',
                        ],
                    ];
                }
            })
            ->first();
    }
}
