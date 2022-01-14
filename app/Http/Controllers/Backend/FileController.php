<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\File;
use App\Models\FileType;
use App\Models\StaticPage;
use App\Http\Requests\FileRequest;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FileController extends Controller
{
    public function index($page = null): View {
        if(is_null($page)){
            $files = File::latest()->with('fileType', 'page')->paginate(10);
        } else {
            $files = File::where('static_page_id',$page)->latest()->with('fileType', 'page')->paginate(10);
            $page = StaticPage::whereId($page)->firstOrFail();
        }

        return view('backend.files.index', compact('files', 'page'));
    }

    public function create(): View {
        $pages = StaticPage::all();
        $fileTypes = FileType::all();

        return view('backend.files.create', compact('pages', 'fileTypes'));
    }

    public function store(FileRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file = File::create($validated);

        if ($request->hasFile('file')) {
            $mediaService->storeMediaOneFile($file, $file->filetype->slug, 'file');
        }

        toastr()->success(__('app.file.store'));
        return redirect()->route('files.index');
    }

    public function edit(File $file): View {
        $pages = StaticPage::all();
        $fileTypes = FileType::all();

        return view('backend.files.edit', compact('file', 'pages', 'fileTypes'));
    }

    public function update( FileRequest $request, File $file, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $file->update($validated);

        if ($request->hasFile('file')) {
            $mediaService->storeMediaOneFile($file, $file->filetype->slug, 'file');
        }

        toastr()->success(__('app.file.update'));
        return redirect()->route('files.index');
    }

    public function destroy(File $file): RedirectResponse {
        $file->delete();

        $file->clearMediaCollection($file->filetype->slug);

        toastr()->success(__('app.file.delete'));
        return redirect()->route('files.index');
    }
}
