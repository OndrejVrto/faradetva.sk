<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use App\Enums\ChartType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ChartRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ChartController extends Controller {
    public function index(Request $request): View {
        $charts = Chart::query()
            ->withCount('data')
            ->latest()
            ->archive($request, 'charts')
            ->paginate(10)
            ->withQueryString();

        return view('admin.charts.index', compact('charts'));
    }

    public function create(): View {
        $chartTypes = ChartType::cases();

        return view('admin.charts.create', compact('chartTypes'));
    }

    public function store(ChartRequest $request): RedirectResponse {
        $validated = $request->validated();
        Chart::create(Chart::sanitize($validated));

        toastr()->success(strval(__('app.chart.store')));
        return to_route('charts.index');
    }

    public function show(Chart $chart): View {
        return view('admin.charts.show', compact('chart'));
    }

    public function edit(Chart $chart): View {
        $chartTypes = ChartType::cases();

        return view('admin.charts.edit', compact('chart', 'chartTypes'));
    }

    public function update(ChartRequest $request, Chart $chart): RedirectResponse {
        $validated = $request->validated();
        $chart->update(Chart::sanitize($validated));

        toastr()->success(strval(__('app.chart.update')));
        return to_route('charts.index');
    }

    public function destroy(Chart $chart): RedirectResponse {
        $chart->delete();

        toastr()->success(strval(__('app.chart.delete')));
        return to_route('charts.index');
    }

    public function restore(int $id): RedirectResponse {
        $chart = Chart::onlyTrashed()->findOrFail($id);
        $chart->slug = Str::slug($chart->title).'-'.Str::random(5);
        $chart->title = '*'.$chart->title;
        $chart->restore();

        toastr()->success(strval(__('app.chart.restore')));
        return to_route('charts.edit', $chart->slug);
    }

    public function force_delete(int $id): RedirectResponse {
        $chart = Chart::onlyTrashed()->findOrFail($id);
        $chart->data()->delete();
        $chart->forceDelete();

        toastr()->success(strval(__('app.chart.force-delete')));
        return to_route('charts.index', ['only-deleted' => 'true']);
    }
}
