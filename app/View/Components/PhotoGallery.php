<?php

namespace App\View\Components;

use App\Models\Gallery;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PhotoGallery extends Component
{
    public $gallery;

    public function __construct(
        public string $titleSlug,
        public string $sourceSmall = "false",
    ) {

        $this->gallery = Cache::rememberForever('GALLERY_'.$titleSlug, function () use($titleSlug) {
            return Gallery::whereSlug($titleSlug)->with('media', 'source')->get()->map(function($album){
                foreach ($album->picture as $pic ) {
                    $picture['picture'][] = [
                        'href' => $pic->getUrl(),
                        'title' => $pic->name,
                        'srcset' => $pic->getSrcset('orginal'),
                        'responsivePicture' => (string) $pic->img('thumb'),
                    ];
                }
                return $picture + [
                    'title' => $album->title,
                    'description' => $album->source->description,
                    'sourceArr' => [
                        'source'      => $album->source->source,
                        'source_url'  => $album->source->source_url,
                        'author'      => $album->source->author,
                        'author_url'  => $album->source->author_url,
                        'license'     => $album->source->license,
                        'license_url' => $album->source->license_url,
                    ],
                ];
            })->first();
        });
        // dd($this->gallery);
    }

    public function render(): View|null {
        if(!is_null($this->gallery)){
            return view('components.photo-gallery.index');
        }
        return null;
    }
}
