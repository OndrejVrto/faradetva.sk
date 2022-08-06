<?php

declare(strict_types=1);

namespace App\Observers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class GlobalObserver {
    private function clearAllCache(): void {
        Artisan::call('cache:clear', ['--quiet' => true, '--no-interaction' => true]);
        ResponseCache::clear();

        customConfig('crawler')
            ->put('___LAST_MODIFIED', Carbon::now()->getTimestamp())
            ->put('___RELOAD', "true");
    }

    public function created(Model $model): void {
        $this->clearAllCache();
    }

    public function updated(Model $model): void {
        $this->clearAllCache();
    }

    public function deleted(Model $model): void {
        $this->clearAllCache();
    }

    public function restored(Model $model): void {
        $this->clearAllCache();
    }

    public function forceDeleted(Model $model): void {
        $this->clearAllCache();
    }
}
