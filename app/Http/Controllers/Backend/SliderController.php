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

        return redirect()->route('sliders.index')->with([
            'message' => 'Nový obrázok s myšlienkou bol pridaný!',
            'alert-type' => 'success'
		]);
    }

    public function edit(Slider $slider) {
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id) {
        $validated = $request->validated();

        $slider = Slider::findOrFail($id);
        $slider->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
            $slider->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('slider');
        }

        return redirect()->route('sliders.index')->with([
            'message' => 'Obrázok s myšlienkou bol upravený.',
            'alert-type' => 'success'
		]);
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        $slider->clearMediaCollection('slider');

        return redirect()->route('sliders.index')->with([
            'message' => 'Obrázok s myšlienkou bol odstránený!',
            'alert-type' => 'success'
		]);
    }
}
