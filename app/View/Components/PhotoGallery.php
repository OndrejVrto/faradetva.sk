<?php

namespace App\View\Components;

use App\Models\Gallery;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PhotoGallery extends Component
{
    public $gallery;
    public $sourceArr = [];

    public function __construct(
        public string $titleSlug,
        public string $sourceSmall = "false",
    ) {
        $this->gallery = Gallery::whereSlug($titleSlug)->with('picture')->first();

        $this->sourceArr = [
            'source' => $this->gallery->source,
            'source_url' => $this->gallery->source_url,
            'author' => $this->gallery->author,
            'author_url' => $this->gallery->author_url,
            'license' => $this->gallery->license,
            'license_url' => $this->gallery->license_url,
        ];
    }

    public function render(): View {
        return view('components.photo-gallery.index');
    }
}
