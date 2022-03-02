<?php

namespace App\Observers;

use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;

class StaticPageObserver
{
    private function clearCache($title){
        if (Cache::has('PAGE_'.$title)) {
            Cache::forget('PAGE_'.$title);
        }
    }

    public function created(StaticPage $staticPage) {
        $this->clearCache($staticPage->slug);
    }

    public function updated(StaticPage $staticPage) {
        $this->clearCache($staticPage->slug);
    }

    public function deleted(StaticPage $staticPage) {
        $this->clearCache($staticPage->slug);
    }

    public function restored(StaticPage $staticPage) {
        $this->clearCache($staticPage->slug);
    }

    public function forceDeleted(StaticPage $staticPage) {
        $this->clearCache($staticPage->slug);
    }
}
