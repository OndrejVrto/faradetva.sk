<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
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

        $this->picture = Cache::rememberForever('PICTURE_'.$titleSlug, function () use($titleSlug) {
            return PictureModel::whereSlug($titleSlug)->with('media', 'source')->get()->map(function($img){
                return [
                    'responsivePicture' => (string) $img
                                            ->getFirstMedia($img->media[0]->collection_name)
                                            ->img('optimize', [
                                                'class' => 'w-100 img-fluid',
                                                'alt' => $img->source->description,
                                                'title' => $img->title,
                                            ]),
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

    public function render(): View|null {
        if (!is_null($this->picture)) {
            return view('components.partials.picture.index');
        }
        return null;
    }
}
