<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagObserver
{
    private function clearCache(){
        if (Cache::has('allTags')) {
            Cache::forget('allTags');
        }
    }

    public function created(Tag $tag) {
        $this->clearCache();
    }

    public function updated(Tag $tag) {
        $this->clearCache();
    }

    public function deleted(Tag $tag) {
        $this->clearCache();
    }

    public function restored(Tag $tag) {
        $this->clearCache();
    }

    public function forceDeleted(Tag $tag) {
        $this->clearCache();
    }
}
