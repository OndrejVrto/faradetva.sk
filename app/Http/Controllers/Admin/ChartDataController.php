<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use App\Models\ChartData;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ChartDataRequest;

class ChartDataController extends Controller {
    public function index(Chart $chart): View {
        $data = ChartData::query()
            ->where('chart_id', $chart->id)
            ->latest('key')
            ->paginate(25);

        return view('admin.chart-data.index', compact('chart', 'data'));
    }

    public function create(Chart $chart): View {
        return view('admin.chart-data.create', compact('chart'));
    }

    public function store(ChartDataRequest $request, Chart $chart): RedirectResponse {
        $validated = $request->validated() + ['chart_id' => $chart->id];
        ChartData::create(ChartData::sanitize($validated));

        toastr()->success(__('app.chart-data.store'));
        return to_route('charts.data.index', $chart);
    }

    public function edit(Chart $chart, ChartData $data): View {
        return view('admin.chart-data.edit', compact('chart', 'data'));
    }

    public function update(ChartDataRequest $request, Chart $chart, ChartData $data): RedirectResponse {
        $validated = $request->validated() + ['chart_id' => $chart->id];
        $data->update(ChartData::sanitize($validated));

        toastr()->success(__('app.chart-data.update'));
        return to_route('charts.data.index', $chart);
    }

    public function destroy(Chart $chart, ChartData $data): RedirectResponse {
        $data->delete();

        toastr()->success(__('app.chart-data.delete'));
        return to_route('charts.data.index', $chart);
    }
}
