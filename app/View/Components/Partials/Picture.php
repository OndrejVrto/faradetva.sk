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

class Picture extends Component
{
    public $picture;
    public array $classColumns;

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
        private int|null $columns = 4,
        private int|null $maxColumns = 7,
        public string|null $side = null,
        public string|null $animation = null,
        public string|null $dimensionSource = 'full',
        public int|null $descriptionCrop = null,
    ) {
        $this->side = in_array($side, self::SIDE) ? $side : 'right';

        $this->animation = in_array($animation, self::ANIMATION_TYPE)
            ? $animation
            : 'from'.$this->side ;

        $this->classColumns = $this->solveColumns($columns, $maxColumns);

        $this->picture = $this->getPicture($titleSlug);

        $this->setSeoMetaTags($this->picture);
    }

    public function render(): View|null {
        if (!is_null($this->picture)) {
            return view('components.partials.picture.index');
        }
        return null;
    }


    private function solveColumns(int $columns, int $maxColumns = 7): array {
        $class['maxXXL'] = $this->cropValue($columns + 0, $maxColumns);
        $class['maxXL']  = $this->cropValue($columns + 1, $maxColumns);
        $class['maxLG']  = $this->cropValue($columns + 2, $maxColumns);
        $class['maxMD']  = $this->cropValue($columns + 3, $maxColumns);
        $class['maxSM']  = $this->cropValue($columns + 4, $maxColumns);

        return $class;
    }

    private function cropValue(int $value, int $max): int {
        if ($value < 1) {
            return 1;
        }
        if ($value > 12 or $value > $max) {
            return 12;
        }
        return $value;
    }

    private function getPicture($slug): array {
        return Cache::rememberForever('PICTURE_'.$slug, function () use($slug) {
            return PictureModel::query()
                ->whereSlug($slug)
                ->with('mediaOne', 'source')
                ->get()
                ->map(fn($e) => $this->mapOutput($e))
                ->first();
        });
    }

    private function mapOutput($img): array {
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
                                        'nonce' => csp_nonce(),
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
