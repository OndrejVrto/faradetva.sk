<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\FilenameSanitize;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\Support\MediaStream;

class GalleryController extends Controller {
    public function index(): View {
        $galleries = Gallery::query()
            ->latest()
            ->with('media', 'source')
            ->withCount('picture')
            ->paginate(5);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View {
        return view('admin.galleries.create', ['pictures' => null]);
    }

    public function storeMedia(Request $request): JsonResponse {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($request->hasFile('pictures')) {
            /** @var \Illuminate\Http\UploadedFile $file  */
            $file = $request->file('pictures');
            // sanitize filename
            $name = (new FilenameSanitize())($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } else {
            // no file
            return response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    public function store(GalleryRequest $request): RedirectResponse {
        $validated = $request->validated();

        $gallery = Gallery::create(Gallery::sanitize($validated));
        $gallery->source()->create(Source::sanitize($validated));

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
        $gallery->load('media', 'source');

        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery): View {
        $gallery->load('media', 'source');
        $pictures = $gallery->getMedia($gallery->collectionName);

        return view('admin.galleries.edit', compact('gallery', 'pictures'));
    }

    public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse {
        $validated = $request->validated();

        $gallery->update(Gallery::sanitize($validated));
        $gallery->source()->update(Source::sanitize($validated));
        $gallery->touch(); // Touch because i need start observer for delete cache

        set_time_limit(300); // 5 minutes
        if ((is_countable($gallery->picture) ? count($gallery->picture) : 0) > 0) {
            foreach ($gallery->picture as $media) {
                if (!in_array($media->file_name, $request->input('picture', []))) {
                    $media->delete();
                }
            }
        }

        $media = $gallery->picture->pluck('file_name')->toArray();

        foreach ($request->input('picture', []) as $file) {
            if ((is_countable($media) ? count($media) : 0) === 0 || !in_array($file, $media)) {
                $gallery
                    ->addMedia(storage_path('tmp/uploads/' . $file))
                    ->toMediaCollection($gallery->collectionName);
            }
        }

        toastr()->success(__('app.gallery.update'));
        return to_route('galleries.index');
    }

    public function download(Gallery $gallery): MediaStream {
        $downloads = $gallery->getMedia($gallery->collectionName);

        return MediaStream::create('Album_'.$gallery->slug.'.zip')->addMedia($downloads);
    }

    public function destroy(Gallery $gallery): RedirectResponse {
        $gallery->source()->delete();
        $gallery->delete();
        $gallery->clearMediaCollection($gallery->collectionName);

        toastr()->success(__('app.gallery.delete'));
        return to_route('galleries.index');
    }
}
