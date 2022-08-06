<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use App\Models\Chart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class StatisticsGraph extends Component {
    public array $graphs;

    public function __construct(
        public array|string|null $names = null
    ) {
        $listOfGraphs = prepareInput($names);

        if ($listOfGraphs) {
            $cacheName = getCacheName($listOfGraphs);

            $this->graphs = Cache::rememberForever('CHART_'.$cacheName, function () use ($listOfGraphs): array {
                return Chart::query()
                    ->whereIn('slug', $listOfGraphs)
                    ->with('data')
                    ->get()
                    ->map(fn ($e) => $this->mapOutput($e))
                    ->toArray();
            });
        }
    }

    public function render(): ?View {
        return empty($this->graphs)
            ? null
            : view('components.partials.statistics-graph.index');
    }

    private function mapOutput(Chart $chart): array {
        return [
            'id'          => $chart->id,
            'title'       => $chart->title,
            'color'       => $chart->color,
            'desription'  => $chart->description,
            'type'        => $chart->type_chart->type(),
            'name_x_axis' => $chart->name_x_axis,
            'name_y_axis' => $chart->name_y_axis,
            'labelGraph'  => $chart->data->pluck('key')->implode(','),
            'dataGraph'   => $chart->data->pluck('value')->implode(','),
        ];
    }
}
