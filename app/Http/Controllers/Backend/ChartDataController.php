<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Chart;
use App\Models\ChartData;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ChartDataRequest;

class ChartDataController extends Controller
{
    public function index(Chart $chart): View {
        $chartData = ChartData::latest()->paginate(10);

        return view('backend.chartDatas.index', compact('chartData'));
    }

    public function create(Chart $chart): View {
        return view('backend.chartDatas.create');
    }

    public function store(ChartDataRequest $request, Chart $chart): RedirectResponse {
        $validated = $request->validated();
        ChartData::create($validated);

        toastr()->success(__('app.chartData.store'));
        return redirect()->route('chartDatas.index');
    }

    public function show(ChartData $chartData, Chart $chart): View {
        return view('backend.chartDatas.show', compact('chartData'));
    }

    public function edit(ChartData $chartData, Chart $chart): View {
        return view('backend.chartDatas.edit', compact('chartData'));
    }

    public function update(ChartDataRequest $request, ChartData $chartData, Chart $chart): RedirectResponse {
        $validated = $request->validated();
        $chartData->update($validated);

        toastr()->success(__('app.chartData.update'));
        return redirect()->route('chartDatas.index');
    }

    public function destroy(ChartData $chartData, Chart $chart): RedirectResponse {
        $chartData->delete();

        toastr()->success(__('app.chartData.delete'));
        return redirect()->route('chartDatas.index');
    }
}
