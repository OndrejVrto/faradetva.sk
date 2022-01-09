<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;

use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{

    public function index()
    {
        Session::remove('slider_old_input_checkbox');

        $sliders = Slider::latest('updated_at')->with('media')->paginate(5);
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $validated = $request->validated();
        $slider = Slider::create($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
            $slider->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('slider');
        }

        $notification = array(
            'message' => 'Nový obrázok s myšlienkou bol pridaný!',
            'alert-type' => 'success'
        );
        return redirect()->route('sliders.index')->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::whereId($id)->firstOrFail();

        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {
        $validated = $request->validated();

        $slider = Slider::findOrFail($id);
        $slider->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
            $slider->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('slider');
        }

        $notification = array(
            'message' => 'Obrázok s myšlienkou bol upravený.',
            'alert-type' => 'success'
        );
        return redirect()->route('sliders.index')->with($notification);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        $slider->clearMediaCollection('slider');

        $notification = array(
            'message' => 'Obrázok s myšlienkou bol odstránený!',
            'alert-type' => 'success'
        );
        return redirect()->route('sliders.index')->with($notification);
    }

}
