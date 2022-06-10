<?php

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\BackgroundPicture as BackgroundPictureModel;

class BackgroundPicture extends Component
{
    public $backgroundPicture;

    public function __construct(
        private string $titleSlug,
    ) {
        $this->backgroundPicture = $this->getPicture($titleSlug);
    }

    public function render(): View|null {
        if (!is_null($this->backgroundPicture)) {
            return view('components.web.sections.background-picture.index');
        }
        return null;
    }

    private function getPicture($titleSlug): array {
        return Cache::rememberForever('PICTURE_BACKGROUND_'.$titleSlug, function () use($titleSlug): array {
            return BackgroundPictureModel::query()
                ->whereSlug($titleSlug)
                ->with('media', 'source')
                ->get()
                ->map(function ($img): array {
                    return [
                        'id'                => $img->id,
                        'title'             => $img->title,
                        'slug'              => $img->slug,

                        'extra_small_image' => $img->getFirstMediaUrl('background_picture', 'extra-small'),
                        'small_image'       => $img->getFirstMediaUrl('background_picture', 'small'),
                        'medium_image'      => $img->getFirstMediaUrl('background_picture', 'medium'),
                        'large_image'       => $img->getFirstMediaUrl('background_picture', 'large'),
                        'extra_large_image' => $img->getFirstMediaUrl('background_picture', 'extra-large'),

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
                })
                ->first();
        });
    }
}
