<?php

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SetSeoPropertiesService;

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

        (new SetSeoPropertiesService())->setPictureSchema($this->banner);
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
        // Get one ramdom slider
        $oneBanner = BannerModel::query()
            ->select('slug')
            ->when($slugs, function ($q) use ($slugs) {
                return $q->whereIn('slug', $slugs);
            })
            ->inRandomOrder()
            ->limit(1)
            ->first();

        // Get all data Slider to Cache
        return Cache::rememberForever('PICTURE_BANNER_'.$oneBanner->slug, function () use($oneBanner): array {
            return BannerModel::query()
                ->whereSlug($oneBanner->slug)
                ->with('media', 'source')
                ->get()
                ->map(fn($e) => $this->mapOutput($e))
                ->first();
        });
    }

    private function mapOutput($banner): array {
        return [
            'id' => $banner->id,
            'slug' => $banner->slug,

            'extra_small_image' => $banner->getFirstMediaUrl('banner', 'extra-small'),
            'small_image'       => $banner->getFirstMediaUrl('banner', 'small'),
            'medium_image'      => $banner->getFirstMediaUrl('banner', 'medium'),
            'large_image'       => $banner->getFirstMediaUrl('banner', 'large'),
            'extra_large_image' => $banner->getFirstMediaUrl('banner', 'extra-large'),

            'img-title'         => $banner->title,
            'img-url'           => $banner->getFirstMediaUrl('banner', 'extra-large'),
            'img-mime'          => $banner->mime_type,
            'img-updated'       => $banner->updated_at->toAtomString(),
            'img-width'         => 1920,
            'img-height'        => 480,

            'img_thumbnail_url'    => $banner->getFirstMediaUrl('banner', 'crop-thumb'),
            'img_thumbnail_width'  => 360,
            'img_thumbnail_height' => 90,

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
