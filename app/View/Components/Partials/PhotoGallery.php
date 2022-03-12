<?php

namespace App\View\Components\Partials;

use App\Models\Gallery;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PhotoGallery extends Component
{
    public $gallery;

    public function __construct(
        public string $titleSlug,
        public string $dimensionSource = 'full',
    ) {
        $this->gallery = $this->getGallery($titleSlug);
    }

    public function render(): View|null {
        if(!is_null($this->gallery)){
            return view('components.partials.photo-gallery.index');
        }
        return null;
    }

    private function getGallery($slug): array {
        return Cache::rememberForever('GALLERY_'.$slug, function () use($slug): array {
            return Gallery::whereSlug($slug)->with('media', 'source')->get()->map(function($album): array {
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

    }
}
