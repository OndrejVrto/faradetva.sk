<?php

namespace App\View\Components\Frontend\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Cache;

class Banner extends Component
{
    public $banner;

    public function __construct(
        public string $dimensionSource = "off",
        public $header = null,
        public $breadcrumb = null,
        private $titleSlug,
    ) {
        $this->banner = $this->getBanner($this->getName($titleSlug));
    }

    public function render(): View|null {
        if (!is_null($this->banner)) {
            return view('components.frontend.sections.banner.index');
        }
        return null;
    }

    private function getBanner(string $slug): array {
        return Cache::rememberForever('BANNER_'.$slug, function() use($slug): array {
            return BannerModel::whereSlug($slug)->with('media', 'source')->get()->map(function($img): array {
                return [
                    'id'                => $img->id,

                    'extra_small_image' => $img->getFirstMediaUrl('banner', 'extra-small'),
                    'small_image'       => $img->getFirstMediaUrl('banner', 'small'),
                    'medium_image'      => $img->getFirstMediaUrl('banner', 'medium'),
                    'large_image'       => $img->getFirstMediaUrl('banner', 'large'),
                    'extra_large_image' => $img->getFirstMediaUrl('banner', 'extra-large'),

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

    private function getName(string $value): string {
        return (string) Str::of($value)
            ->explode(',')
            ->map(function($value){
                return trim($value);
            })
            ->whereNotNull()
            ->filter(function ($value) {
                return $value != '';
            })
            ->shuffle()
            ->first();
    }
}
