<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\File;
use App\Http\Requests\FileRequest;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FileController extends Controller
{
    public function index(): View {
        $files = File::latest()->paginate(10);

        return view('backend.files.index', compact('files'));
    }

    public function create(): View {
        return view('backend.files.create');
    }

    public function store(FileRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file = File::create($validated);

        if ($request->hasFile('file')) {
            $mediaService->storeMediaOneFile($file, $file->collectionName, 'attachment');
        }

        toastr()->success(__('app.file.store'));
        return redirect()->route('files.index');
    }

    public function edit(File $file): View {
        return view('backend.files.edit', compact('file'));
    }

    public function update(FileRequest $request, File $file, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file->update($validated);
        if ($request->hasFile('file')) {
            $mediaService->storeMediaOneFile($file, $file->collectionName, 'attachment');
        }

        toastr()->success(__('app.file.update'));
        return redirect()->route('files.index');
    }

    public function destroy(File $file): RedirectResponse {
        $file->delete();
        $file->clearMediaCollection($file->collectionName);

        toastr()->success(__('app.file.delete'));
        return redirect()->route('files.index');
    }
}
