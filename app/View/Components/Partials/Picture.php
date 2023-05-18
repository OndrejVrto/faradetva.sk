<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Picture as PictureModel;
use App\Services\SEO\SeoPropertiesService;

class Picture extends Component {
    public ?array $picture;
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
        string $titleSlug,
        int $columns = 4,
        int $maxColumns = 7,
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
    }

    public function render(): View|null {
        if (is_null($this->picture)) {
            return null;
        }

        (new SeoPropertiesService())->setPictureSchema($this->picture);

        return view('components.partials.picture.index');
    }


    /**
     * @return array{maxXXL: int, maxXL: int, maxLG: int, maxMD: int, maxSM: int}
     */
    private function solveColumns(int $columns, int $maxColumns): array {
        return [
            'maxXXL' => $this->cropValue($columns, $maxColumns),
            'maxXL'  => $this->cropValue($columns + 1, $maxColumns),
            'maxLG'  => $this->cropValue($columns + 2, $maxColumns),
            'maxMD'  => $this->cropValue($columns + 3, $maxColumns),
            'maxSM'  => $this->cropValue($columns + 4, $maxColumns),
        ];
    }

    private function cropValue(int $value, int $max): int {
        if ($value < 1) {
            return 1;
        }
        if ($value > 12 || $value > $max) {
            return 12;
        }
        return $value;
    }

    private function getPicture(string $slug): ?array {
        return Cache::rememberForever(
            key: 'PICTURE_'.$slug,
            callback: fn () => PictureModel::query()
                ->where('slug', $slug)
                ->with('mediaOne', 'source')
                ->get()
                ->map(fn ($img) => $this->mapOutput($img))
                ->first()
        );
    }

    private function mapOutput(\Illuminate\Database\Eloquent\Model $img): array {
        $colectionName = $img->mediaOne?->collection_name;
        $media = $img->getFirstMedia($colectionName);

        return [
            'img-title'   => $img->title,
            'img-slug'    => $img->slug,
            'img-updated' => $img->updated_at?->toAtomString(),
            'img-width'   => $img->crop_output_width,
            'img-height'  => $img->crop_output_height,

            'responsivePicture'  => (string) $media?->img(
                conversionName: 'optimize',
                extraAttributes: [
                    'id' => 'pic-'.$img->slug,
                    'class' => 'w-100 img-fluid',
                    'alt' => $img->source?->source_description,
                    'nonce' => csp_nonce(),
                ]
            ),
            'img-url'                 => $media?->getUrl('optimize'),
            'img-mime'                => $media?->mime_type,

            'img_thumbnail_url'    => $media?->getUrl('crop-thumb'),
            'img_thumbnail_width'  => floor($img->crop_output_width/$img->crop_output_height * 100),
            'img_thumbnail_height' => 100,

            'source_description'      => $img->source?->source_description,
            'source_description_crop' => Str::words($img->source->source_description ?? '', $this->descriptionCrop ?? 6, '...'),
            'sourceArr' => [
                'source_source'       => $img->source?->source_source,
                'source_source_url'   => $img->source?->source_source_url,
                'source_author'       => $img->source?->source_author,
                'source_author_url'   => $img->source?->source_author_url,
                'source_license'      => $img->source?->source_license,
                'source_license_url'  => $img->source?->source_license_url,
            ],
        ];
    }
}
