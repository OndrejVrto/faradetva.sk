<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Slider;

use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::latest('updated_at')->with('media')->paginate(5);

        Session::remove('slider_old_input_checkbox');

        return view('backend.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('backend.sliders.create');
    }

    public function store(SliderRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $slider = Slider::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, 'slidert', 'photo');
        }

        toastr()->success(__('app.slider.store'));
        return redirect()->route('sliders.index');
    }

    public function edit(Slider $slider) {
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $slider->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($slider, 'slidert', 'photo');
        }

        toastr()->success(__('app.slider.update'));
        return redirect()->route('sliders.index');
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        $slider->clearMediaCollection('slider');

        toastr()->success(__('app.slider.delete'));
        return redirect()->route('sliders.index');
    }
}
