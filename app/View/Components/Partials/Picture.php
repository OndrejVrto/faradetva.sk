<?php

namespace App\View\Components\Partials;

use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
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
        $this->animation = in_array($animation, self::ANIMATION_TYPE) ? $animation : 'fromright';

        $this->picture = PictureModel::query()
            ->whereSlug($titleSlug)
            ->with('mediaOne', 'source')
            ->get()
            ->map(function($img) {
                $colectionName = $img->mediaOne->collection_name;
                $media = $img->getFirstMedia($colectionName);
                // $height = Image::load( $media->getPath('optimize') )->getHeight();
                // $width = Image::load( $media->getPath('optimize') )->getWidth();

                return [
                    'img-title'       => $img->title,
                    'img-slug'        => $img->slug,
                    'img-description' => $img->source->source_description,
                    // 'img-height'      => $height,
                    // 'img-width'       => $width,
                    'responsivePicture' => (string) $media
                                            ->img('optimize', [
                                                'class' => 'w-100 img-fluid',
                                                'alt' => $img->source->source_description,
                                                'title' => $img->title,
                                                'nonce' => csp_nonce(),
                                                // 'height' => $height,
                                                // 'width' => $width,
                                            ]),
                    // 'url'               => (string) $img->getFirstMediaUrl($img->media[0]->collection_name),
                    'url'               => $media->getUrl('optimize'),
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
        // TODO: SEO
        $JsonLD = Schema::imageObject()
            ->name(e($pictureData['img-title']))
            ->identifier(e($pictureData['url']))
            ->url(e($pictureData['url']))
            ->description('TODO:')
            ->alternateName('TODO:')
            ->width(100)
            ->height(500)
            ->encodingFormat('TODO:')
            ->uploadDate(now())  //TODO:
            ->license(e($pictureData['sourceArr']['source_license']))
            ->acquireLicensePage(e($pictureData['sourceArr']['source_license_url']))
            ->toArray();


        unset($JsonLD['@context']);
        SeoSchema::addImage([
            $JsonLD
        ]);
    }
}
