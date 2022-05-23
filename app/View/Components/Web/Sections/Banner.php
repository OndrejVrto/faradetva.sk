<?php

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Banner as BannerModel;

class Banner extends Component
{
    public $banner = null;

    public function __construct(
        public $header = null,
        public $breadcrumb = null,
        private null|string|array $titleSlug = null,
        public null|string $dimensionSourceBanner = "medium",
    ) {
        $this->banner = $this->getBanner($this->cleanListBanners($titleSlug));
    }

    public function render(): View|null {
        if (!is_null($this->banner)) {
            return view('components.web.sections.banner.index');
        }

        if (!is_null($this->header)) {
            return view('components.web.sections.banner.header');
        }

        return null;
    }

    private function getBanner(?array $slugs) {
        return BannerModel::query()
            ->when($slugs, function($q) use($slugs) {
                return $q->whereIn('slug', $slugs);
            })
            ->inRandomOrder()
            ->with('media', 'source')
            ->limit(1)
            ->get()
            ->map(function($banner): array {
                return [
                    'id' => $banner->id,
                    'slug' => $banner->slug,

                    'extra_small_image' => $banner->getFirstMediaUrl('banner', 'extra-small'),
                    'small_image'       => $banner->getFirstMediaUrl('banner', 'small'),
                    'medium_image'      => $banner->getFirstMediaUrl('banner', 'medium'),
                    'large_image'       => $banner->getFirstMediaUrl('banner', 'large'),
                    'extra_large_image' => $banner->getFirstMediaUrl('banner', 'extra-large'),

                    'source_description'       => $banner->source->source_description,
                    'sourceArr' => [
                        'source_source'        => $banner->source->source_source,
                        'source_source_url'    => $banner->source->source_source_url,
                        'source_author'        => $banner->source->source_author,
                        'source_author_url'    => $banner->source->source_author_url,
                        'source_license'       => $banner->source->source_license,
                        'source_license_url'   => $banner->source->source_license_url,
                    ],
                ];
            })
            ->first();
    }

    private function cleanListBanners(null|string|array $namesBanners): ?array {
        if(is_null($namesBanners)){
            return null;
        }

        if(is_array($namesBanners)){
            return $namesBanners;
        };

        return (string) Str::of($namesBanners)
            ->explode(',')
            ->map(function($namesBanners){
                return trim($namesBanners);
            })
            ->whereNotNull()
            ->filter(function ($namesBanners) {
                return $namesBanners != '';
            });
    }
}
