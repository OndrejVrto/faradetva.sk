<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function index() {
        $testimonials = Testimonial::latest('updated_at')->with('media')->paginate(6);

        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create() {
        return view('backend.testimonials.create');
    }

    public function store(TestimonialRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $testimonial = Testimonial::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($testimonial, $testimonial->collectionName, 'photo');
        }

        toastr()->success(__('app.testimonia.store'));
        return to_route('testimonials.index');
    }

    public function edit(Testimonial $testimonial) {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $testimonial->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($testimonial, $testimonial->collectionName, 'photo');
        }

        toastr()->success(__('app.testimonia.update'));
        return to_route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial) {
        $testimonial->delete();
        $testimonial->clearMediaCollection($testimonial->collectionName);

        toastr()->success(__('app.testimonia.delete'));
        return to_route('testimonials.index');
    }
}
