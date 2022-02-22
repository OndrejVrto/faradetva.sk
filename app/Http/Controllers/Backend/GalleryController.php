<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Helpers\DataFormater;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\RedirectResponse;

class GalleryController extends Controller
{
    public function index(): View {
        $galleries = Gallery::latest()->with('media')->withCount('picture')->paginate(5);

        return view('backend.galleries.index', compact('galleries'));
    }

    public function create(): View {
        return view('backend.galleries.create');
    }

    public function storeMedia(Request $request) {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('pictures');
        // sanitize filename
        $name = DataFormater::filterFilename($file->getClientOriginalName(), true);

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function store(GalleryRequest $request): RedirectResponse {
        $validated = $request->validated();
        $gallery = Gallery::create($validated);

        set_time_limit(300); // 5 minutes
        foreach ($request->input('picture', []) as $file) {
            $gallery
                ->addMedia(storage_path('tmp/uploads/' . $file))
                ->toMediaCollection($gallery->collectionName);
        }

        toastr()->success(__('app.gallery.store'));
        return to_route('galleries.index');
    }

    public function show(Gallery $gallery): View {
        $gallery->load('media');

        return view('backend.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery): View {
        $gallery->load('media');
        $pictures = $gallery->getMedia($gallery->collectionName);

        return view('backend.galleries.edit', compact('gallery', 'pictures'));
    }

    public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse {
        $validated = $request->validated();
        $gallery->update($validated);

        set_time_limit(300); // 5 minutes
        if (count($gallery->picture) > 0) {
            foreach ($gallery->picture as $media) {
                if (!in_array($media->file_name, $request->input('picture', []))) {
                    $media->delete();
                }
            }
        }

        $media = $gallery->picture->pluck('file_name')->toArray();

        foreach ($request->input('picture', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $gallery
                    ->addMedia(storage_path('tmp/uploads/' . $file))
                    ->toMediaCollection($gallery->collectionName);
            }
        }

        toastr()->success(__('app.gallery.update'));
        return to_route('galleries.index');
    }

    public function destroy(Gallery $gallery): RedirectResponse {
        $gallery->delete();
        $gallery->clearMediaCollection($gallery->collectionName);

        toastr()->success(__('app.gallery.delete'));
        return to_route('galleries.index');
    }
}
