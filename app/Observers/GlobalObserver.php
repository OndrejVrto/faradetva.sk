<?php

namespace App\Observers;

// use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class GlobalObserver
{
    private function clearAllCache() {
        Artisan::call('cache:clear');
        Cache::put('LAST_MODIFIED', Carbon::now()->timestamp);
    }

    public function created(Model $model) {
        $this->clearAllCache();
        // Log::info('GlobalObserver -> created -> '. $model->getTable());
    }
    public function updated(Model $model) {
        $this->clearAllCache();
        // Log::info('GlobalObserver -> updated -> '. $model->getTable());
    }
    public function deleted(Model $model) {
        $this->clearAllCache();
        // Log::info('GlobalObserver -> deleted -> '. $model->getTable());
    }
    public function restored(Model $model) {
        $this->clearAllCache();
        // Log::info('GlobalObserver -> restored -> '. $model->getTable());
    }

    public function forceDeleted(Model $model) {
        $this->clearAllCache();
        // Log::info('GlobalObserver -> forceDeleted -> '. $model->getTable());
    }
}
