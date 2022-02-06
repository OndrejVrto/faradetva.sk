<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Chart;
use App\Http\Requests\ChartRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ChartController extends Controller
{
    public function index(): View {
        $charts = Chart::latest()->paginate(10);

        return view('backend.charts.index', compact('charts'));
    }

    public function create(): View {
        return view('backend.charts.create');
    }

    public function store(ChartRequest $request): RedirectResponse {
        $validated = $request->validated();
        Chart::create($validated);

        toastr()->success(__('app.chart.store'));
        return redirect()->route('charts.index');
    }

    public function show(Chart $chart): View {
        return view('backend.charts.show', compact('chart'));
    }

    public function edit(Chart $chart): View {
        return view('backend.charts.edit', compact('chart'));
    }

    public function update( ChartRequest $request, Chart $chart): RedirectResponse {
        $validated = $request->validated();
        $chart->update($validated);

        toastr()->success(__('app.chart.update'));
        return redirect()->route('charts.index');
    }

    public function destroy(Chart $chart): RedirectResponse {
        $chart->delete();

        toastr()->success(__('app.chart.delete'));
        return redirect()->route('charts.index');
    }
}
