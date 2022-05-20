<?php

namespace App\View\Components\Partials;

use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use Spatie\SchemaOrg\ImageObject;
use Illuminate\Contracts\View\View;
use App\Models\Picture as PictureModel;

class Picture extends Component
{
    public $picture;

    private const SIDE = [
        'left',
        'right',
    ];

    private const ANIMATION_TYPE = [
        'fromtop',
        'frombottom',
        'fromleft',
        'fromright',
        'zoom',
        'zoom_in',
        'zoom_out',
        'stratch',
        'rotate',
        'flipin',
        'flipinY',
        'spin',
        'spin_back',
        'sonarEffect',
        'fadeleft',
        'fadeIn',
        'fadeOut',
        'slidein',
        'slideout',
        'slideup',
        'slidedown',
        'loader',
        'load_fade',
    ];

    public function __construct(
        private string $titleSlug,
        public int|null $columns = 4,
        public string|null $side = null,
        public string|null $animation = null,
        public string|null $dimensionSource = 'full',
    ) {
        $this->side = in_array($side, self::SIDE) ? $side : 'right';

        $this->animation = in_array($animation, self::ANIMATION_TYPE)
            ? $animation
            : 'from'.$this->side ;

        $this->picture = PictureModel::query()
            ->whereSlug($titleSlug)
            ->with('mediaOne', 'source')
            ->get()
            ->map(function($img) {
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
                                                'id' => 'pic-'.$img->slug,
                                                'class' => 'w-100 img-fluid',
                                                'alt' => $img->source->source_description,
                                                // 'title' => $img->source->source_description,
                                                // 'title' => $img->title,
                                                'nonce' => csp_nonce(),
                                                'height' => $img->crop_output_height,
                                                'width' => $img->crop_output_width,
                                            ]),
                    // 'url'               => (string) $img->getFirstMediaUrl($img->media[0]->collection_name),
                    'url'                => $media->getUrl('optimize'),
                    'img-mime'           => $media->mime_type,

                    'source_description' => $img->source->source_description,
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

        $this->setSeoMetaTags($this->picture);
    }

    public function render(): View|null {
        if (!is_null($this->picture)) {
            return view('components.partials.picture.index');
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
