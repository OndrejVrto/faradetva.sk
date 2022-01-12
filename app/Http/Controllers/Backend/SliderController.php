<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;

use App\Http\Helpers\DataFormater;
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

    public function store(SliderRequest $request) {
        $validated = $request->validated();
        $slider = Slider::create($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
            $slider->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('slider');
        }

        toastr()->success(__('app.slider.store'));
        return redirect()->route('sliders.index');
    }

    public function edit(Slider $slider) {
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider) {
        $validated = $request->validated();
        $slider->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
            $slider->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('slider');
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
