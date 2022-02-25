<?php

namespace App\Observers;

use App\Models\Chart;
use App\Models\ChartData;
use Illuminate\Support\Facades\Cache;

class ChartDataObserver
{

    private function clearCache($id){

        $name = Chart::find($id)->slug;

        if (Cache::has('CHART_'.$name)) {
            Cache::forget('CHART_'.$name);
        }
    }

    public function created(ChartData $chartData) {
        $this->clearCache($chartData->chart_id);
    }

    public function updated(ChartData $chartData) {
        $this->clearCache($chartData->chart_id);
    }

    public function deleted(ChartData $chartData) {
        $this->clearCache($chartData->chart_id);
    }

    public function restored(ChartData $chartData) {
        $this->clearCache($chartData->chart_id);
    }

    public function forceDeleted(ChartData $chartData) {
        $this->clearCache($chartData->chart_id);
    }
}
