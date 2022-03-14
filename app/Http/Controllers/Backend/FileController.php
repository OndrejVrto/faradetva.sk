<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\File;
use Illuminate\Support\Arr;
use App\Http\Requests\FileRequest;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\FilePropertiesService;

class FileController extends Controller
{
    public function index(): View {
        $paginator = File::with('media','source')->latest()->paginate(10);
        $files = (new FilePropertiesService())->allFileData($paginator->items());

        return view('backend.files.index', compact('paginator', 'files'));
    }

    public function create(): View {
        return view('backend.files.create');
    }

    public function store(FileRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file = File::create($validated);
        $sourceData = Arr::except($validated, ['title', 'slug', 'attachment']);
        $file->source()->create($sourceData);

        if ($request->hasFile('attachment')) {
            $mediaService->storeMediaOneFile($file, $file->collectionName, 'attachment');
        }

        toastr()->success(__('app.file.store'));
        return to_route('files.index');
    }

    public function edit(File $file): View {
        $file->load('source');

        return view('backend.files.edit', compact('file'));
    }

    public function update(FileRequest $request, File $file, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file->update($validated);
        $sourceData = Arr::except($validated, ['title', 'slug', 'attachment']);
        $file->source()->update($sourceData);
        $file->touch(); // Touch because i need start observer for delete cache

        if ($request->hasFile('attachment')) {
            $mediaService->storeMediaOneFile($file, $file->collectionName, 'attachment');
        }

        toastr()->success(__('app.file.update'));
        return to_route('files.index');
    }

    public function destroy(File $file): RedirectResponse {
        $file->source()->delete();
        $file->delete();
        $file->clearMediaCollection($file->collectionName);

        toastr()->success(__('app.file.delete'));
        return to_route('files.index');
    }
}
