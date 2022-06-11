<?php

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Slider as SliderModel;
use Illuminate\Support\Facades\Cache;

class Slider extends Component
{
    public $sliders = [];

    public function __construct() {
        $this->getSliders();
    }

    public function render(): View|null {
        if (!is_null($this->sliders)) {
            return view('components.web.sections.slider.index');
        }
        return null;
    }

    private function getSliders(): void {
        $randomSliders = SliderModel::query()
            ->select('id')
            ->whereActive(1)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        foreach ($randomSliders as $oneSlider) {
            $this->sliders[] = Cache::rememberForever('PICTURE_SLIDER_'.$oneSlider->id, function() use($oneSlider): array {
                return SliderModel::query()
                        ->whereId($oneSlider->id)
                        ->with('media', 'source')
                        ->get()
                        ->map(fn($e) => $this->mapOutput($e))
                        ->first();
            });
        }
    }

    private function mapOutput($slider): array {
        return [
            'id'                => $slider->id,

            'heading_row_1'     => $slider->heading_1,
            'heading_row_2'     => $slider->heading_2,
            'heading_row_3'     => $slider->heading_3,

            'extra_small_image' => $slider->getFirstMediaUrl('slider', 'extra-small'),
            'small_image'       => $slider->getFirstMediaUrl('slider', 'small'),
            'medium_image'      => $slider->getFirstMediaUrl('slider', 'medium'),
            'large_image'       => $slider->getFirstMediaUrl('slider', 'large'),
            'extra_large_image' => $slider->getFirstMediaUrl('slider', 'extra-large'),

            'source_description'       => $slider->source->source_description,
            'sourceArr' => [
                'source_source'        => $slider->source->source_source,
                'source_source_url'    => $slider->source->source_source_url,
                'source_author'        => $slider->source->source_author,
                'source_author_url'    => $slider->source->source_author_url,
                'source_license'       => $slider->source->source_license,
                'source_license_url'   => $slider->source->source_license_url,
            ],
        ];
    }
}
