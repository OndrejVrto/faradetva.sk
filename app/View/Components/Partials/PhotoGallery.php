<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use App\Models\Gallery;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\SEO\SeoPropertiesService;

class PhotoGallery extends Component {
    public ?array $gallery;

    public function __construct(
        public string $titleSlug,
        public bool $viewDescription = true,
        public string|null $dimensionSource = 'full',
    ) {
        $this->gallery = $this->getGallery($titleSlug);
    }

    public function render(): View|null {
        if (is_null($this->gallery)) {
            return null;
        }

        (new SeoPropertiesService())->setGallerySchema($this->gallery);

        return view('components.partials.photo-gallery.index');
    }

    private function getGallery(string $slug): ?array {
        return Cache::rememberForever(
            key: 'GALLERY_'.$slug,
            callback: fn () => Gallery::query()
                ->where('slug', $slug)
                ->with('media', 'source')
                ->get()
                ->map(fn ($e) => $this->mapOutput($e))
                ->first()
        );
    }

    /**
     * @return array{title: mixed, slug: mixed, source_description: mixed, sourceArr: array{source_source: mixed, source_source_url: mixed, source_author: mixed, source_author_url: mixed, source_license: mixed, source_license_url: mixed}, picture?: array<int, array{href: mixed, title: mixed, srcset: mixed, responsivePicture: string}>&mixed[]}
     */
    private function mapOutput(Gallery $album): array {
        $picture = [];
        foreach ($album->picture as $pic) {
            $picture['picture'][] = [
                'href' => $pic->getUrl(),
                'title' => $pic->name,
                'srcset' => $pic->getSrcset('orginal'),
                'responsivePicture' => (string) $pic->img('thumb'),
            ];
        }
        return $picture + [
            'title' => $album->title,
            'slug'  => $album->slug,
            'source_description' => $album->source?->source_description,
            'sourceArr' => [
                'source_source'      => $album->source?->source_source,
                'source_source_url'  => $album->source?->source_source_url,
                'source_author'      => $album->source?->source_author,
                'source_author_url'  => $album->source?->source_author_url,
                'source_license'     => $album->source?->source_license,
                'source_license_url' => $album->source?->source_license_url,
            ],
        ];
    }
}
