<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Source;
use App\Http\Requests\FileRequest;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\FilePropertiesService;

class FileController extends Controller {
    public function index(): View {
        $paginator = File::query()
            ->with('media', 'source')
            ->latest()
            ->paginate(10);
        $files = (new FilePropertiesService())->allFileData($paginator->items());

        return view('admin.files.index', compact('paginator', 'files'));
    }

    public function create(): View {
        return view('admin.files.create');
    }

    public function store(FileRequest $request): RedirectResponse {
        $validated = $request->validated();

        $file = File::create(File::sanitize($validated));
        $file->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handle($file, $request, 'attachment', $validated['slug']);

        toastr()->success(__('app.file.store'));
        return to_route('files.index');
    }

    public function edit(File $file): View {
        $file->load('source');

        return view('admin.files.edit', compact('file'));
    }

    public function update(FileRequest $request, File $file): RedirectResponse {
        $validated = $request->validated();

        $file->update(File::sanitize($validated));
        $file->source()->update(Source::sanitize($validated));
        $file->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handle($file, $request, 'attachment', $validated['slug']);

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
