<?php

namespace App\View\Components\Partials;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Picture as PictureModel;
use App\Services\SEO\SetSeoPropertiesService;

class PictureResponsive extends Component
{
    public $picture;

    public function __construct(
        private string $titleSlug,
        public string|null $dimensionSource = 'full',
        public string|null $descriptionSide = 'right',
        public int|null $descriptionCrop = null,
        public string|null $class = null,
    ) {
        $this->picture = Cache::rememberForever('PICTURE_RESPONSIVE_'.$titleSlug, function () use($titleSlug, $class, $descriptionCrop) {
            return PictureModel::query()
                ->whereSlug($titleSlug)
                ->with('mediaOne', 'source')
                ->get()
                ->map(fn($e) => $this->mapOutput($e))
                ->first();
        });
    }

    public function render(): View|null {
        if (!is_null($this->picture)) {
            (new SetSeoPropertiesService())->setPictureSchema($this->picture);

            return view('components.partials.picture-responsive.index');
        }
        return null;
    }

    private function mapOutput($img): array {
        $colectionName = $img->mediaOne->collection_name;
        $media = $img->getFirstMedia($colectionName);

        return [
            'img-title'   => $img->title,
            'img-slug'    => $img->slug,
            'img-updated' => $img->updated_at->toAtomString(),
            'img-width'   => $img->crop_output_width,
            'img-height'  => $img->crop_output_height,

            'responsivePicture'  => (string) $media
                                    ->img('optimize', [
                                        'id' => 'picr-'.$img->slug,
                                        'class' => $this->class ?: 'img-fluid d-block mx-auto',
                                        'alt' => $img->source->source_description,
                                        'nonce' => csp_nonce(),
                                    ]),
            'img-url'                 => $media->getUrl('optimize'),
            'img-mime'                => $media->mime_type,

            'img_thumbnail_url'       => $media->getUrl('crop-thumb'),
            'img_thumbnail_width'     => ceil($img->crop_output_width/$img->crop_output_height * 100),
            'img_thumbnail_height'    => 100,

            'source_description'      => $img->source->source_description,
            'source_description_crop' => Str::words($img->source->source_description, $descriptionCrop ?? 6, '...'),
            'sourceArr' => [
                'source_source'       => $img->source->source_source,
                'source_source_url'   => $img->source->source_source_url,
                'source_author'       => $img->source->source_author,
                'source_author_url'   => $img->source->source_author_url,
                'source_license'      => $img->source->source_license,
                'source_license_url'  => $img->source->source_license_url,
            ],
        ];
    }
}
