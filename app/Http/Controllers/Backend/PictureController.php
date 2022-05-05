<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Source;
use App\Models\Picture;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PictureRequest;
use Illuminate\Http\RedirectResponse;

class PictureController extends Controller
{
    public function index(): View {
        $pictures = Picture::query()
            ->latest('updated_at')
            ->with('media', 'source')
            ->paginate(5);

        return view('backend.pictures.index', compact('pictures'));
    }

    public function create(): View {
        return view('backend.pictures.create');
    }

    public function store(PictureRequest $request): RedirectResponse {
        $validated = $request->validated();

        $picture = Picture::create(Picture::sanitize($validated));
        $picture->source()->create(Source::sanitize($validated));

        (new MediaStoreService)->handleCropPicture($picture, $request);

        toastr()->success(__('app.picture.store'));
        return to_route('pictures.index');
    }

    public function show(Picture $picture): View {
        $picture->load('media', 'source');

        return view('backend.pictures.show', compact('picture'));
    }

    public function edit(Picture $picture): View {
        $picture->load('source');

        return view('backend.pictures.edit', compact('picture'));
    }

    public function update(PictureRequest $request, Picture $picture): RedirectResponse {
        $validated = $request->validated();

        $picture->update(Picture::sanitize($validated));
        $picture->source()->update(Source::sanitize($validated));
        $picture->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService)->handleCropPicture($picture, $request);

        toastr()->success(__('app.picture.update'));
        return to_route('pictures.index');
    }

    public function destroy(Picture $picture): RedirectResponse {
        $picture->source()->delete();
        $picture->delete();
        $picture->clearMediaCollection($picture->collectionName);

        toastr()->success(__('app.picture.delete'));
        return to_route('pictures.index');
    }
}
