<?php

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Slider as SliderModel;

class Slider extends Component
{
    public $sliders;

    public function __construct() {
        $this->sliders = $this->getSliders();
    }

    public function render(): View|null {
        if (!is_null($this->sliders)) {
            return view('components.web.sections.slider.index');
        }
        return null;
    }

    private function getSliders(): array {
        $countSliders = SliderModel::query()
            ->whereActive(1)
            ->count();

        return SliderModel::query()
            ->whereActive(1)
            ->with('media', 'source')
            ->get()
            ->shuffle()
            ->random(min($countSliders, 3))
            ->map(function($img): array {

                if($img->getFirstMedia()){
                    return [
                        'id'                => $img->id,

                        'heading_row_1'     => $img->heading_1,
                        'heading_row_2'     => $img->heading_2,
                        'heading_row_3'     => $img->heading_3,

                        'extra_small_image' => $img->getFirstMediaUrl('slider', 'extra-small'),
                        'small_image'       => $img->getFirstMediaUrl('slider', 'small'),
                        'medium_image'      => $img->getFirstMediaUrl('slider', 'medium'),
                        'large_image'       => $img->getFirstMediaUrl('slider', 'large'),
                        'extra_large_image' => $img->getFirstMediaUrl('slider', 'extra-large'),

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

                        'heading_row_1'     => $img->heading_1,
                        'heading_row_2'     => $img->heading_2,
                        'heading_row_3'     => $img->heading_3,

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
            ->toArray();
    }
}
