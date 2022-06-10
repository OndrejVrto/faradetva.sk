<?php

namespace App\View\Components\Partials;

use App\Facades\SeoSchema;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Picture as PictureModel;

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
                ->map(function ($img) use ($class, $descriptionCrop) {
                    $colectionName = $img->mediaOne->collection_name;
                    $media = $img->getFirstMedia($colectionName);

                    return [
                        'img-title'   => $img->title,
                        'img-slug'    => $img->slug,
                        'img-updated' => $img->updated_at,
                        'img-width'   => $img->crop_output_width,
                        'img-height'  => $img->crop_output_height,

                        'responsivePicture'  => (string) $media
                                                ->img('optimize', [
                                                    'id' => 'picr-'.$img->slug,
                                                    'class' => $class ?: 'img-fluid d-block mx-auto',
                                                    'alt' => $img->source->source_description,
                                                    'title' => $img->source->source_description,
                                                    'nonce' => csp_nonce(),
                                                    'height' => $img->crop_output_height,
                                                    'width' => $img->crop_output_width,
                                                ]),
                        'url'                => $media->getUrl('optimize'),
                        'img-mime'           => $media->mime_type,

                        'source_description' => $img->source->source_description,
                        'source_description_crop' => Str::words($img->source->source_description, $descriptionCrop ?? 6, '...'),
                        'sourceArr' => [
                            'source_source'      => $img->source->source_source,
                            'source_source_url'  => $img->source->source_source_url,
                            'source_author'      => $img->source->source_author,
                            'source_author_url'  => $img->source->source_author_url,
                            'source_license'     => $img->source->source_license,
                            'source_license_url' => $img->source->source_license_url,
                        ],
                    ];
                })
                ->first();
        });

        $this->setSeoMetaTags($this->picture);
    }

    public function render(): View|null {
        if (!is_null($this->picture)) {
            return view('components.partials.picture-responsive.index');
        }
        return null;
    }

    private function setSeoMetaTags(array $pictureData): void {
        $JsonLD = Schema::imageObject()
            ->name(e($pictureData['img-title']))
            ->identifier(e($pictureData['url']))
            ->url(e($pictureData['url']))
            ->description(e($pictureData['source_description']))
            ->alternateName(e($pictureData['source_description']))
            ->width($pictureData['img-width'])
            ->height($pictureData['img-height'])
            ->encodingFormat($pictureData['img-mime'])
            ->uploadDate($pictureData['img-updated'])
            ->license(e($pictureData['sourceArr']['source_license']))
            ->acquireLicensePage(e($pictureData['sourceArr']['source_license_url']))
            ->if(isset($pictureData['sourceArr']['source_author']) OR isset($pictureData['sourceArr']['source_author_url']), function (ImageObject $schema) use ($pictureData) {
                $schema->author(
                    Schema::person()
                        ->name(e($pictureData['sourceArr']['source_author']))
                        ->sameAs(e($pictureData['sourceArr']['source_author_url']))
                );
            })
            ->toArray();

        unset($JsonLD['@context']);
        SeoSchema::addImage([
            $JsonLD
        ]);
    }
}
