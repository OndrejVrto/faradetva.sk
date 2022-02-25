<?php

namespace App\Observers;

use App\Models\Chart;
use Illuminate\Support\Facades\Cache;

class ChartObserver
{
    private function clearCache($name){
        if (Cache::has('CHART_'.$name)) {
            Cache::forget('CHART_'.$name);
        }
    }

    public function created(Chart $chart) {
        $this->clearCache($chart->slug);
    }

    public function updated(Chart $chart) {
        $this->clearCache($chart->slug);
    }

    public function deleted(Chart $chart) {
        $this->clearCache($chart->slug);
    }

    public function restored(Chart $chart) {
        $this->clearCache($chart->slug);
    }

    public function forceDeleted(Chart $chart) {
        $this->clearCache($chart->slug);
    }
}
