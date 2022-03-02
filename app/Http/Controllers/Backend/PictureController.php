<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Picture;
use Illuminate\Support\Arr;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PictureRequest;
use Illuminate\Http\RedirectResponse;

class PictureController extends Controller
{
    public function index(): View {
        $pictures = Picture::latest('updated_at')->with('media', 'source')->paginate(5);

        return view('backend.pictures.index', compact('pictures'));
    }

    public function create(): View {
        return view('backend.pictures.create');
    }

    public function store(PictureRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $picture = Picture::create($validated);
        $sourceData = Arr::except($validated, ['title', 'slug', 'photo']);
        $picture->source()->create($sourceData);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($picture, $picture->collectionName, 'photo');
        }

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

    public function update(PictureRequest $request, Picture $picture, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $picture->update($validated);
        $sourceData = Arr::except($validated, ['title', 'slug', 'photo']);
        $picture->source()->update($sourceData);
        $picture->touch(); // Touch because i need start observer for delete cache

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($picture, $picture->collectionName, 'photo');
        }

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
