<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class GalleryObserver
{
    private function clearCache($title){
        if (Cache::has('GALLERY_'.$title)) {
            Cache::forget('GALLERY_'.$title);
        }
    }

    public function created(Gallery $gallery) {
        $this->clearCache($gallery->slug);
    }

    public function updated(Gallery $gallery) {
        $this->clearCache($gallery->slug);
    }

    public function deleted(Gallery $gallery) {
        $this->clearCache($gallery->slug);
    }

    public function restored(Gallery $gallery) {
        $this->clearCache($gallery->slug);
    }

    public function forceDeleted(Gallery $gallery) {
        $this->clearCache($gallery->slug);
    }
}
