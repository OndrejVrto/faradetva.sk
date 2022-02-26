<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Banner as BannerModel;

class Banner extends Component
{
    public $banner;

    public function __construct(
        public string $sourceSmall = "false",
        private string $titleSlug = "",
    ) {
        $this->banner = Cache::rememberForever('BANNER_'.$titleSlug, function () use($titleSlug) {
            return BannerModel::whereSlug($titleSlug)->with('media', 'source')->get()->map(function($img){
                return [
                    'extra_small_image' => $img->getFirstMediaUrl('banner', 'extra-small'),
                    'small_image' => $img->getFirstMediaUrl('banner', 'small'),
                    'medium_image' => $img->getFirstMediaUrl('banner', 'medium'),
                    'large_image' => $img->getFirstMediaUrl('banner', 'large'),
                    'extra_large_image' => $img->getFirstMediaUrl('banner', 'extra-large'),
                    'sourceArr' => [
                        'source'      => $img->source->source,
                        'source_url'  => $img->source->source_url,
                        'author'      => $img->source->author,
                        'author_url'  => $img->source->author_url,
                        'license'     => $img->source->license,
                        'license_url' => $img->source->license_url,
                    ],
                ];
            })->first();
        });
    }

    public function render(): View {
        if (!is_null($this->banner)) {
            return view('components.banner.index');
        }
        return null;
    }
}
