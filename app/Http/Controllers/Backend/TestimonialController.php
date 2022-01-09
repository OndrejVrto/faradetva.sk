<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function index() {
        Session::remove('testimonial_old_input_checkbox');

        $testimonials = Testimonial::latest('updated_at')->with('media')->paginate(6);
        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create() {
        return view('backend.testimonials.create');
    }

    public function store(TestimonialRequest $request) {
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

    public function edit($slug) {
        $testimonial = Testimonial::whereSlug($slug)->firstOrFail();

        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, $id) {
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

    public function destroy($id) {
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
