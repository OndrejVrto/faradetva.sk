<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Slider as SliderModel;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SeoPropertiesService;

class Slider extends Component {
    public ?array $sliders;

    public function __construct() {
        $this->sliders = $this->getSliders();
    }

    public function render(): ?View {
        if (is_null($this->sliders)) {
            return null;
        }

        foreach ($this->sliders as $slider) {
            (new SeoPropertiesService())->setPictureSchema($slider);
        }

        return view('components.web.sections.slider.index');
    }

    private function getSliders(): ?array {
        $randomSliders = SliderModel::query()
            ->select('id')
            ->whereActive(1)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        foreach ($randomSliders as $oneSlider) {
            $slider[] = Cache::rememberForever(
                key: 'PICTURE_SLIDER_'.$oneSlider->id,
                callback: fn (): ?array => SliderModel::query()
                    ->whereId($oneSlider->id)
                    ->with('media', 'source')
                    ->get()
                    ->map(fn ($slider) => $this->mapOutput($slider))
                    ->first()
            );
        }

        return $slider ?? null;
    }

    private function mapOutput(SliderModel $slider): array {
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

            'img-title'         => $slider->id.': '.$slider->heading_1,
            'img-url'           => $slider->getFirstMediaUrl('slider', 'extra-large'),
            'img-mime'          => $slider->mime_type,
            'img-updated'       => $slider->updated_at?->toAtomString(),
            'img-width'         => 1920,
            'img-height'        => 800,

            'img_thumbnail_url'    => $slider->getFirstMediaUrl('slider', 'crop-thumb'),
            'img_thumbnail_width'  => 192,
            'img_thumbnail_height' => 80,

            'source_description'       => $slider->source?->source_description,
            'sourceArr' => [
                'source_source'        => $slider->source?->source_source,
                'source_source_url'    => $slider->source?->source_source_url,
                'source_author'        => $slider->source?->source_author,
                'source_author_url'    => $slider->source?->source_author_url,
                'source_license'       => $slider->source?->source_license,
                'source_license_url'   => $slider->source?->source_license_url,
            ],
        ];
    }
}
