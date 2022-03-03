<?php

namespace App\Observers;

use App\Models\Picture;
use Illuminate\Support\Facades\Cache;

class PictureObserver
{
    private function clearCache($title){
        if (Cache::has('PICTURE_'.$title)) {
            Cache::forget('PICTURE_'.$title);
        }
    }

    public function created(Picture $picture) {
        $this->clearCache($picture->slug);
    }

    public function updated(Picture $picture) {
        $this->clearCache($picture->slug);
    }

    public function deleted(Picture $picture) {
        $this->clearCache($picture->slug);
    }

    public function restored(Picture $picture) {
        $this->clearCache($picture->slug);
    }

    public function forceDeleted(Picture $picture) {
        $this->clearCache($picture->slug);
    }
}
