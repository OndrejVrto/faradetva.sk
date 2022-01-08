<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;

use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TestimonialRequest;

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

		$testimonials = Testimonial::latest('updated_at')->with('media')->paginate(6);
		return view('backend.testimonials.index', compact('testimonials'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonials.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
		$validated = $request->validated();
		$testimonial = Testimonial::create($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$testimonial->clearMediaCollectionExcept('testimonial', $testimonial->getFirstMedia());
			$testimonial->addMediaFromRequest('photo')
						->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
						->toMediaCollection('testimonial');
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

		return view('backend.testimonials.edit', compact('testimonial'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
		$validated = $request->validated();

		$testimonial = Testimonial::findOrFail($id);
		$testimonial->update($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$testimonial->clearMediaCollectionExcept('testimonial', $testimonial->getFirstMedia());
			$testimonial->addMediaFromRequest('photo')
						->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
						->toMediaCollection('testimonial');
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
