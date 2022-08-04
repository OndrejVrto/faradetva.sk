<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Source;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\RedirectResponse;

class SliderController extends Controller {
    public function index(Request $request): View {
        $sliders = Slider::query()
            ->latest('updated_at')
            ->with('media')
            ->archive($request, 'sliders')
            ->paginate(5)
            ->withQueryString();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create(): View {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request): RedirectResponse {
        $validated = $request->validated();

        $slider = Slider::create(Slider::sanitize($validated));
        $slider->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($slider, $request, $slider->breadcrumb_teaser);

        toastr()->success(strval(__('app.slider.store')));
        return to_route('sliders.index');
    }

    public function edit(Slider $slider): View {
        $slider->load('source');

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider): RedirectResponse {
        $validated = $request->validated();

        $slider->update(Slider::sanitize($validated));
        $slider->source()->update(Source::sanitize($validated));
        $slider->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handleCropPicture($slider, $request, $slider->breadcrumb_teaser);

        toastr()->success(strval(__('app.slider.update')));
        return to_route('sliders.index');
    }

    public function destroy(Slider $slider): RedirectResponse {
        $slider->delete();

        toastr()->success(strval(__('app.slider.delete')));
        return to_route('sliders.index');
    }

    public function restore(int $id): RedirectResponse {
        $slider = Slider::onlyTrashed()->findOrFail($id);
        $slider->restore();

        toastr()->success(strval(__('app.slider.restore')));
        return to_route('sliders.edit', $slider->id);
    }

    public function force_delete(int $id): RedirectResponse {
        $slider = Slider::onlyTrashed()->findOrFail($id);
        $slider->source()->delete();
        $slider->clearMediaCollection($slider->collectionName);
        $slider->forceDelete();

        toastr()->success(strval(__('app.slider.force-delete')));
        return to_route('sliders.index', ['only-deleted' => 'true']);
    }
}
