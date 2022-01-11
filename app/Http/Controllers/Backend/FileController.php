<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\File;
use App\Models\FileType;
use App\Http\Requests\FileRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FileController extends Controller
{
    public function index(): View {
        $files = File::latest()->with('fileType', 'page')->paginate(10);

        return view('backend.files.index', compact('files'));
    }

    public function create(): View {
        $fileTypes = FileType::all();

        return view('backend.files.create', compact('fileTypes'));
    }

    public function store(FileRequest $request): RedirectResponse {
        $validated = $request->validated();
        File::create($validated);
        //! TODO: Medialibrary and Statis-page_id
        toastr()->success(__('app.file.store'));
        return redirect()->route('files.index');
    }

    public function edit(File $file): View {
        $fileTypes = FileType::all();

        return view('backend.files.edit', compact('file', 'fileTypes'));
    }

    public function update( FileRequest $request, File $file): RedirectResponse {
        $validated = $request->validated();
        $file->update($validated);
        //! TODO: Medialibrary and Statis-page_id
        toastr()->success(__('app.file.update'));
        return redirect()->route('files.index');
    }

    public function destroy(File $file): RedirectResponse {
        $file->delete();
        //! TODO: Medialibrary
        toastr()->success(__('app.file.delete'));
        return redirect()->route('files.index');
    }
}
