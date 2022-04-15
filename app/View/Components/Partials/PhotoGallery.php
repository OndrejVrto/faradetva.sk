<?php

namespace App\View\Components\Partials;

use App\Models\Gallery;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use Spatie\SchemaOrg\ImageGallery;
use Illuminate\Contracts\View\View;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Illuminate\Support\Facades\Cache;

class PhotoGallery extends Component
{
    public $gallery;

    public function __construct(
        public string $titleSlug,
        public string|null $dimensionSource = 'full',
    ) {
        $this->gallery = $this->getGallery($titleSlug);
        $this->setSeoMetaTags($this->gallery);
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

    private function setSeoMetaTags(array $album): void {
        $pictures = [];
        foreach ($album['picture'] as $picture) {
            $pictures[] = Schema::imageObject()
                ->contentUrl($picture['href'])
                ->name($picture['title']);
        }

        $JsonLD = Schema::imageGallery()
            ->name($album['title'])
            ->description($album['description'])
            ->if(isset($album['sourceArr']['author']) OR isset($album['sourceArr']['author_url']), function (imageGallery $schema) use ($album) {
                $schema->author(
                    Schema::person()
                        ->name($album['sourceArr']['author'])
                        ->sameAs($album['sourceArr']['author_url'])
                );
            })
            ->license($album['sourceArr']['license'])
            ->usageInfo($album['sourceArr']['license_url'])
            ->if( isset($album['sourceArr']['source_url']) OR isset($album['sourceArr']['source']), function (ImageGallery $schema) use ($album) {
                $schema->copyrightHolder(
                    Schema::organization()
                        ->name($album['sourceArr']['source'])
                        ->url($album['sourceArr']['source_url'])
                );
            })
            ->associatedMedia( $pictures )
            ->toArray();

        unset($JsonLD['@context']);

        // JsonLd::addValue('hasPart1', $JsonLD );

        if(! JsonLdMulti::isEmpty()) {
            JsonLdMulti::newJsonLd();
            JsonLdMulti::select(0);

            JsonLdMulti::setType('ImageGallery');
            JsonLdMulti::addValue('key', $JsonLD);
        }
    }
}
