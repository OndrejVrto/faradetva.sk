<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Chart;
use App\Enum\ChartType;
use Illuminate\Support\Arr;
use App\Http\Requests\ChartRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ChartController extends Controller
{
    public function index(): View {
        $charts = Chart::withCount('data')->latest()->paginate(10);

        return view('backend.charts.index', compact('charts'));
    }

    public function create(): View {
        $chartTypes = collect(ChartType::values());

        return view('backend.charts.create', compact('chartTypes'));
    }

    public function store(ChartRequest $request): RedirectResponse {
        $validated = $request->validated();
        Chart::create($validated);

        toastr()->success(__('app.chart.store'));
        return to_route('charts.index');
    }

    public function show(Chart $chart): View {
        return view('backend.charts.show', compact('chart'));
    }

    public function edit(Chart $chart): View {
        $chartTypes = collect(ChartType::values());

        return view('backend.charts.edit', compact('chart', 'chartTypes'));
    }

    public function update( ChartRequest $request, Chart $chart): RedirectResponse {
        $validated = $request->validated();
        $chart->update($validated);

        toastr()->success(__('app.chart.update'));
        return to_route('charts.index');
    }

    public function destroy(Chart $chart): RedirectResponse {
        $chart->delete();

        toastr()->success(__('app.chart.delete'));
        return to_route('charts.index');
    }
}
