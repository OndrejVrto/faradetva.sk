<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use App\Models\Chart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class StatisticsGraph extends Component {
    public array $graphs;

    public function __construct(
        public int|null $id = null,
        public string|null $notId = "0",
        public string|null $teaser = null,
        public string|null $after = null,
        public float|int|null $aspectRatio = 4,
    ) {
        if (null !== $id) {
            $this->graphs = Cache::rememberForever(
                key: 'CHART_'.$id,
                callback: fn (): array => Chart::query()
                    ->where('id', $id)
                    ->where('active', true)
                    ->with('data')
                    ->get()
                    ->map(fn ($chart) => $this->mapOutput($chart))
                    ->toArray()
            );
        } elseif(null !== $notId) {
            $listOfGraphs = prepareInput($notId);
            $cacheName = getCacheName($listOfGraphs);

            $this->graphs = Cache::rememberForever(
                key: 'CHART_'.$cacheName,
                callback: fn (): array => Chart::query()
                    ->whereNotIn('id', $listOfGraphs)
                    ->where('active', true)
                    ->with('data')
                    ->get()
                    ->map(fn ($chart) => $this->mapOutput($chart))
                    ->toArray()
            );
        } else {
            $this->graphs = Cache::rememberForever(
                key: 'CHART_ALL',
                callback: fn (): array => Chart::query()
                    ->where('active', true)
                    ->with('data')
                    ->get()
                    ->map(fn ($chart) => $this->mapOutput($chart))
                    ->toArray()
            );
        }
    }

    public function render(): ?View {
        return empty($this->graphs)
            ? null
            : view('components.partials.statistics-graph.index');
    }

    /**
     * @return array{id: mixed, title: mixed, color: mixed, desription: mixed, type: mixed, name_x_axis: mixed, name_y_axis: mixed, labelGraph: mixed, dataGraph: mixed}
     */
    private function mapOutput(Chart $chart): array {
        return [
            'chartType'   => $chart->type_chart,
            'id'          => $chart->id,
            'title'       => $chart->title,
            'color'       => $chart->color,
            'desription'  => $chart->description,
            'type'        => $chart->type_chart->type(),
            'name_x_axis' => $chart->name_x_axis,
            'name_y_axis' => $chart->name_y_axis,
            'dataGraph'   => $chart->data->pluck('value')->implode(','),
            'labelGraph'  => $chart->data->pluck('key')->map(fn($i) => '"'.$i.'"')->implode(','),
            'dataColor'   => $chart->data->pluck('color')->map(fn($i) => '"'.$i.'99"')->implode(','),
        ];
    }
}
