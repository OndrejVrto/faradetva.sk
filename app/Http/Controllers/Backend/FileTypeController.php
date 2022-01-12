<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\FileType;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FileTypeRequest;

class FileTypeController extends Controller
{
    public function index(): View {
        $fileTypes = FileType::latest()->paginate(10);

        return view('backend.file-types.index', compact('fileTypes'));
    }

    public function create(): View {
        return view('backend.file-types.create');
    }

    public function store(FileTypeRequest $request): RedirectResponse {
        $validated = $request->validated();
        FileType::create($validated);

        toastr()->success(__('app.file-type.store'));
        return redirect()->route('file-types.index');
    }

    public function show(FileType $fileType): View {
        return view('backend.file-types.show', compact('fileType'));
    }

    public function edit(FileType $fileType): View {
        return view('backend.file-types.edit', compact('fileType'));
    }

    public function update( FileTypeRequest $request, FileType $fileType): RedirectResponse {
        $validated = $request->validated();
        $fileType->update($validated);

        toastr()->success(__('app.file-type.update'));
        return redirect()->route('file-types.index');
    }

    public function destroy(FileType $fileType): RedirectResponse {
        $fileType->delete();

        toastr()->success(__('app.file-type.delete'));
        return redirect()->route('file-types.index');
    }
}
