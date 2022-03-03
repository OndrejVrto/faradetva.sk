<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    private function clearCache(){
        // max pages: 100 ??
        for ($i=1; $i <= 100 ; $i++) {
            $key = 'NEWS_ALL_PAGE-' . $i;
            if (Cache::has($key)) {
                Cache::forget($key);
            } else {
                continue;
            }
        }

        if (Cache::has('NEWS_LAST')) {
            Cache::forget('NEWS_LAST');
        }
    }

    public function created(News $news) {
        $this->clearCache();
    }

    public function updated(News $news) {
        $this->clearCache();
    }

    public function deleted(News $news) {
        $this->clearCache();
    }

    public function restored(News $news) {
        $this->clearCache();
    }

    public function forceDeleted(News $news) {
        $this->clearCache();
    }
}
