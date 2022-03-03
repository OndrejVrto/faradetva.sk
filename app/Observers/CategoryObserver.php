<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    private function clearCache(){
        if (Cache::has('CATEGORIES_ALL')) {
            Cache::forget('CATEGORIES_ALL');
        }
    }

    public function created(Category $category) {
        $this->clearCache();
    }

    public function updated(Category $category) {
        $this->clearCache();
    }

    public function deleted(Category $category) {
        $this->clearCache();
    }

    public function restored(Category $category) {
        $this->clearCache();
    }

    public function forceDeleted(Category $category) {
        $this->clearCache();
    }
}
