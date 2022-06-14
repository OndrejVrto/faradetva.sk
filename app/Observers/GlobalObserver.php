<?php

namespace App\Observers;

use Carbon\Carbon;
use Spatie\Valuestore\Valuestore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class GlobalObserver
{
    private function clearAllCache() {
        Artisan::call('cache:clear');
        ResponseCache::clear();

        $store = Valuestore::make(config('farnost-detva.value_store.crawler'));
        $store->put('___LAST_MODIFIED', Carbon::now()->timestamp);
        $store->put('___RELOAD', true);
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
