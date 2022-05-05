<?php

namespace App\View\Components\Partials;

use App\Models\Chart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StatisticsGraph extends Component
{
    public $graphs;

    public function __construct(
        public array|string|null $names = null
    ) {

        $listOfGraphs = prepareInput($names);

        if ($listOfGraphs) {
            $this->graphs = Chart::query()
                ->whereIn('slug', $listOfGraphs)
                ->with('data')
                ->get()
                ->map(function ($chart) {
                    return [
                        'id' => $chart->id,
                        'title' => $chart->title,
                        'color' => $chart->color,
                        'desription' => $chart->description,
                        'type' => $chart->type_chart->type(),
                        'name_x_axis' => $chart->name_x_axis,
                        'name_y_axis' => $chart->name_y_axis,
                        'labelGraph' => $chart->data->pluck('key')->implode(','),
                        'dataGraph' => $chart->data->pluck('value')->implode(','),
                    ];
                });
        }
    }

    public function render(): View {
        return view('components.partials.statistics-graph.index');
    }
}
