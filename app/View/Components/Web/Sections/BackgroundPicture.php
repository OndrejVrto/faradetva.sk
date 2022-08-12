<?php

declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SetSeoPropertiesService;
use App\Models\BackgroundPicture as BackgroundPictureModel;

class BackgroundPicture extends Component {
    public ?array $backgroundPicture;

    public function __construct(
        string $titleSlug,
    ) {
        $this->backgroundPicture = $this->getPicture($titleSlug);
    }

    public function render(): View|null {
        if (is_null($this->backgroundPicture)) {
            return null;
        }

        (new SetSeoPropertiesService())->setPictureSchema($this->backgroundPicture);

        return view('components.web.sections.background-picture.index');
    }

    private function getPicture(string $titleSlug): ?array {
        return Cache::rememberForever(
            key: 'PICTURE_BACKGROUND_'.$titleSlug,
            callback: fn (): ?array => BackgroundPictureModel::query()
                ->whereSlug($titleSlug)
                ->with('media', 'source')
                ->get()
                ->map(fn ($img) => $this->mapOutput($img))
                ->first()
        );
    }

    private function mapOutput(BackgroundPictureModel $img): array {
        return [
            'id'                => $img->id,
            'title'             => $img->title,
            'slug'              => $img->slug,

            'extra_small_image' => $img->getFirstMediaUrl('background_picture', 'extra-small'),
            'small_image'       => $img->getFirstMediaUrl('background_picture', 'small'),
            'medium_image'      => $img->getFirstMediaUrl('background_picture', 'medium'),
            'large_image'       => $img->getFirstMediaUrl('background_picture', 'large'),
            'extra_large_image' => $img->getFirstMediaUrl('background_picture', 'extra-large'),

            'img-title'         => $img->title,
            'img-url'           => $img->getFirstMediaUrl('background_picture', 'extra-large'),
            'img-mime'          => $img->mime_type,
            'img-updated'       => $img->updated_at->toAtomString(),
            'img-width'         => 1920,
            'img-height'        => 1440,

            'img_thumbnail_url'    => $img->getFirstMediaUrl('background_picture', 'crop-thumb'),
            'img_thumbnail_width'  => 192,
            'img_thumbnail_height' => 144,

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
    }
}
