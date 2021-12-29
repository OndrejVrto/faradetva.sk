<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSliderRequest;

class SliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		Session::remove('slider_old_input_checkbox');

		$sliders = Slider::latest('updated_at')->with('media')->paginate(5);
		return view('sliders.index', compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
		$validated = $request->validated();
		$slider = Slider::create($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
			$slider->addMediaFromRequest('photo')->toMediaCollection('slider');
		}


		$notification = array(
			'message' => 'Nový obrázok s myšlienkou bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('sliders.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$slider = Slider::whereId($id)->firstOrFail();

		return view('sliders.edit', compact('slider'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSliderRequest $request, $id)
    {
		$validated = $request->validated();

		$slider = Slider::findOrFail($id);
		$slider->update($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$slider->clearMediaCollectionExcept('slider', $slider->getFirstMedia());
			$slider->addMediaFromRequest('photo')->toMediaCollection('slider');
		}

		$notification = array(
			'message' => 'Obrázok s myšlienkou bol upravený.',
			'alert-type' => 'success'
		);
        return redirect()->route('sliders.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
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
