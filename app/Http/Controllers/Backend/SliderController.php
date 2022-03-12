<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Arr;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\RedirectResponse;

class SliderController extends Controller
{
    public function index(): View  {
        $sliders = Slider::latest('updated_at')->with('media')->paginate(5);

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
        $slider->source()->delete();
        $slider->delete();
        $slider->clearMediaCollection($slider->collectionName);

        toastr()->success(__('app.slider.delete'));
        return to_route('sliders.index');
    }
}
