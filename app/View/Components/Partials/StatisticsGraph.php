<?php

namespace App\View\Components\Partials;

use App\Models\Chart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class StatisticsGraph extends Component
{
    public $graph;
    public $labelGraph;
    public $dataGraph;

    public function __construct(
        public string $name
    ) {
        $this->graph = Cache::rememberForever('CHART_'.$name, function () use($name) {
            return Chart::whereSlug($name)->with('data')->get()->map(function($chart) {
                return [
                    'id' => $chart->id,
                    'title' => $chart->title,
                    'labelGraph' => $chart->data->pluck('key')->implode(','),
                    'dataGraph' => $chart->data->pluck('value')->implode(','),
                ];
            })->first();
        });
    }

    public function render(): View {
        return view('components.partials.statistics-graph.index');
    }
}
