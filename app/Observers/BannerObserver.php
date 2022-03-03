<?php

namespace App\Observers;

use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannerObserver
{
    private function clearCache($title){
        if (Cache::has('BANNER_'.$title)) {
            Cache::forget('BANNER_'.$title);
        }
    }

    public function created(Banner $banner) {
        $this->clearCache($banner->slug);
    }

    public function updated(Banner $banner) {
        $this->clearCache($banner->slug);
    }

    public function deleted(Banner $banner) {
        $this->clearCache($banner->slug);
    }

    public function restored(Banner $banner) {
        $this->clearCache($banner->slug);
    }

    public function forceDeleted(Banner $banner) {
        $this->clearCache($banner->slug);
    }
}
