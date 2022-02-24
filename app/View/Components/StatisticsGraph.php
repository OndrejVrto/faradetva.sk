<?php

namespace App\View\Components;

use App\Models\Chart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StatisticsGraph extends Component
{
    public $graph;
    public $labelGraph;
    public $dataGraph;

    public function __construct(
        public string $name
    ) {
        $this->graph = Chart::whereTitle($name)->with('data')->first();

        $this->labelGraph = collect($this->graph->data)->pluck('key')->implode(',');
        // dump($this->labelGraph);
        $this->dataGraph = collect($this->graph->data)->pluck('value')->implode(',');
        // dd($this->dataGraph);
    }

    public function render(): View {
        return view('components.statistics-graph.index');
    }
}
