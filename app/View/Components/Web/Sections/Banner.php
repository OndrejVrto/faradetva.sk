<?php

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Arr;
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
        public null|string $dimensionSourceBanner = "full",
    ) {
        if(is_null($titleSlug)){
            $titleSlug = BannerModel::query()
                ->select('slug')
                ->pluck('slug')
                ->toArray();
        }

        if(is_null($titleSlug)){
            return;
        }

        if($this->getName($titleSlug) != ''){
            $this->banner = $this->getBanner($this->getName($titleSlug));
        }
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

    private function getBanner(string $slug): array {
        return BannerModel::query()
            ->whereSlug($slug)
            ->with('media', 'source')
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

    private function getName(string|array $namesBanners): string {
        if(is_array($namesBanners)){
            return head(Arr::shuffle($namesBanners));
        };

        return (string) Str::of($namesBanners)
            ->explode(',')
            ->map(function($namesBanners){
                return trim($namesBanners);
            })
            ->whereNotNull()
            ->filter(function ($namesBanners) {
                return $namesBanners != '';
            })
            ->shuffle()
            ->first();
    }
}
