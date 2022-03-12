<?php

namespace App\View\Components\Frontend\Sections;

use App\Models\Slider as SliderModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Slider extends Component
{
    public $sliders;

    public function __construct() {
        $this->sliders = $this->getSliders();
        // dd($this->slider);
    }

    public function render(): View|null {
        if (!is_null($this->sliders)) {
            return view('components.frontend.sections.slider.index');
        }
        return null;
    }

    private function getSliders(): array {
        return Cache::remember('SLIDERS-random', now()->addHours(1) ,function(): array {
            $countSliders = SliderModel::whereActive(1)->count();
            return SliderModel::whereActive(1)
                ->with('media', 'source')
                ->get()
                ->shuffle()
                ->random(min($countSliders, 3))
                ->map(function($img): array {
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
            })->toArray();
        });
    }
}
