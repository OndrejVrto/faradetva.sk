<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		Session::remove('testimonial_old_input_checkbox');

		$testimonials = Testimonial::latest('updated_at')->with('media')->paginate(10);
		return view('testimonials.index', compact('testimonials'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
		$validated = $request->validated();
		$testimonial = Testimonial::create($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$testimonial->clearMediaCollectionExcept('testimonial', $testimonial->getFirstMedia());
			$testimonial->addMediaFromRequest('photo')->toMediaCollection('testimonial');
		}


		$notification = array(
			'message' => 'Nové svedectvo bolo pridané!',
			'alert-type' => 'success'
		);
        return redirect()->route('testimonials.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$testimonial = Testimonial::whereSlug($slug)->firstOrFail();

		return view('testimonials.edit', compact('testimonial'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestimonialRequest $request, $id)
    {
		$validated = $request->validated();

		$testimonial = Testimonial::findOrFail($id);
		$testimonial->update($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$testimonial->clearMediaCollectionExcept('testimonial', $testimonial->getFirstMedia());
			$testimonial->addMediaFromRequest('photo')->toMediaCollection('testimonial');
		}

		$notification = array(
			'message' => 'Svedectvo bolo upravené.',
			'alert-type' => 'success'
		);
        return redirect()->route('testimonials.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$testimonial = Testimonial::findOrFail($id);
		$testimonial->delete();
		$testimonial->clearMediaCollection('testimonial');

		$notification = array(
			'message' => 'Svedectvo bolo odstránené!',
			'alert-type' => 'success'
		);
		return redirect()->route('testimonials.index')->with($notification);
    }

}
