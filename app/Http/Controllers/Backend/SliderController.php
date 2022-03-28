<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\RedirectResponse;

class SliderController extends Controller
{
    public function index(Request $request): View {
        $sliders = Slider::query()
            ->latest('updated_at')
            ->with('media')
            ->archive($request, 'sliders')
            ->paginate(5)
            ->withQueryString();

        return view('backend.sliders.index', compact('sliders'));
    }

    public function create(): View  {
        return view('backend.sliders.create');
    }

    public function store(SliderRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $slider = Slider::create($validated);
        $sourceData = Arr::except($validated, ['active', 'heading_1', 'heading_2', 'heading_3']);
        $slider->source()->create($sourceData);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, $slider->collectionName, 'photo');
        }

        toastr()->success(__('app.slider.store'));
        return to_route('sliders.index');
    }

    public function edit(Slider $slider): View {
        $slider->load('source');

        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $slider->update($validated);
        $sourceData = Arr::except($validated, ['active', 'heading_1', 'heading_2', 'heading_3']);
        $slider->source()->update($sourceData);
        $slider->touch(); // Touch because i need start observer for delete cache

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, $slider->collectionName, 'photo');
        }

        toastr()->success(__('app.slider.update'));
        return to_route('sliders.index');
    }

    public function destroy(Slider $slider): RedirectResponse {
        $slider->delete();

        toastr()->success(__('app.slider.delete'));
        return to_route('sliders.index');
    }

    public function restore($id): RedirectResponse {
        $slider = Slider::onlyTrashed()->findOrFail($id);
        $slider->restore();

        toastr()->success(__('app.slider.restore'));
        return to_route('sliders.edit', $slider->id);
    }

    public function force_delete($id): RedirectResponse {
        $slider = Slider::onlyTrashed()->findOrFail($id);
        $slider->source()->delete();
        $slider->clearMediaCollection($slider->collectionName);
        $slider->forceDelete();

        toastr()->success(__('app.slider.force-delete'));
        return to_route('sliders.index');
    }
}
