<?php

namespace App\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class GlobalObserver
{
    private function clearAllCache() {
        Artisan::call('cache:clear');
        Cache::forever('___LAST_MODIFIED', Carbon::now()->timestamp);
        Cache::forever('___RELOAD', true);
    }

    public function created(Model $model) {
        $this->clearAllCache();
    }

    public function updated(Model $model) {
        $this->clearAllCache();
    }

    public function deleted(Model $model) {
        $this->clearAllCache();
    }

    public function restored(Model $model) {
        $this->clearAllCache();
    }

    public function forceDeleted(Model $model) {
        $this->clearAllCache();
    }
}