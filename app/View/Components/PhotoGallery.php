<?php

namespace App\View\Components;

use App\Models\Gallery;
use Illuminate\View\Component;

class PhotoGallery extends Component
{

    public $gallery;

    public function __construct(
        public string $titleSlug,
    ) {
        $this->gallery = Gallery::whereSlug($titleSlug)->with('picture')->first();
    }

    public function render()
    {
        return view('components.photo-gallery.index');
    }
}
