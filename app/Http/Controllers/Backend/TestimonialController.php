<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function index(): View  {
        $testimonials = Testimonial::latest('updated_at')->with('media')->paginate(6);

        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create(): View  {
        return view('backend.testimonials.create');
    }

    public function store(TestimonialRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $testimonial = Testimonial::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($testimonial, $testimonial->collectionName, 'photo');
        }

        toastr()->success(__('app.testimonial.store'));
        return to_route('testimonials.index');
    }

    public function edit(Testimonial $testimonial): View  {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $testimonial->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($testimonial, $testimonial->collectionName, 'photo');
        }

        toastr()->success(__('app.testimonial.update'));
        return to_route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse {
        $testimonial->delete();
        $testimonial->clearMediaCollection($testimonial->collectionName);

        toastr()->success(__('app.testimonial.delete'));
        return to_route('testimonials.index');
    }
}
