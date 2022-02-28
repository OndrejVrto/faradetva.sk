<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Picture as PictureModel;

class Picture extends Component
{
    public $picture;

    public function __construct(
        public int $columns = 4,
        public string $arrival = "left",
        public string $dimensionSource = 'full',
        private string $titleSlug = "",
    ) {
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
            return view('components.picture.index');
        }
        return null;
    }
}
