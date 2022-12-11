<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller {
    public function index(Request $request): View {
        $testimonials = Testimonial::query()
            ->latest('updated_at')
            ->with('media')
            ->archive($request, 'testimonials')
            ->paginate(6)
            ->withQueryString();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View {
        return view('admin.testimonials.create');
    }

    public function store(TestimonialRequest $request): RedirectResponse {
        $validated = $request->validated();
        $testimonial = Testimonial::create(Testimonial::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($testimonial, $request, $validated['slug']);

        toastr()->success((string) __('app.testimonial.store'));
        return to_route('testimonials.index');
    }

    public function edit(Testimonial $testimonial): View {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse {
        $validated = $request->validated();
        $testimonial->update(Testimonial::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($testimonial, $request, $validated['slug']);

        toastr()->success((string) __('app.testimonial.update'));
        return to_route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse {
        $testimonial->delete();

        toastr()->success((string) __('app.testimonial.delete'));
        return to_route('testimonials.index');
    }

    public function restore(int $id): RedirectResponse {
        $testimonial = Testimonial::onlyTrashed()->findOrFail($id);
        $testimonial->slug = Str::slug($testimonial->name).'-'.Str::random(5);
        $testimonial->name = '*'.$testimonial->name;
        $testimonial->restore();

        toastr()->success((string) __('app.testimonial.restore'));
        return to_route('testimonials.edit', $testimonial->slug);
    }

    public function force_delete(int $id): RedirectResponse {
        $testimonial = Testimonial::onlyTrashed()->findOrFail($id);
        $testimonial->clearMediaCollection($testimonial->collectionName);
        $testimonial->forceDelete();

        toastr()->success((string) __('app.testimonial.force-delete'));
        return to_route('testimonials.index', ['only-deleted' => 'true']);
    }
}
