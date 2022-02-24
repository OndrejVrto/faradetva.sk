<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
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

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, $slider->collectionName, 'photo');
        }

        toastr()->success(__('app.slider.store'));
        return to_route('sliders.index');
    }

    public function edit(Slider $slider): View  {
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $slider->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, $slider->collectionName, 'photo');
        }

        toastr()->success(__('app.slider.update'));
        return to_route('sliders.index');
    }

    public function destroy(Slider $slider): RedirectResponse {
        $slider->delete();
        $slider->clearMediaCollection($slider->collectionName);

        toastr()->success(__('app.slider.delete'));
        return to_route('sliders.index');
    }
}
