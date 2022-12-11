<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use App\Models\BackgroundPicture;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BackgroundPictureRequest;

class BackgroundPictureController extends Controller {
    public function index(): View {
        $backgroundPictures = BackgroundPicture::query()
            ->latest('updated_at')
            ->with('media', 'source')
            ->paginate(8);

        return view('admin.background-pictures.index', compact('backgroundPictures'));
    }

    public function create(): View {
        return view('admin.background-pictures.create');
    }

    public function store(BackgroundPictureRequest $request): RedirectResponse {
        $validated = $request->validated();

        $backgroundPicture = BackgroundPicture::create(BackgroundPicture::sanitize($validated));
        $backgroundPicture->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($backgroundPicture, $request);

        toastr()->success((string) __('app.background-picture.store'));
        return to_route('background-pictures.index');
    }

    public function show(BackgroundPicture $backgroundPicture): View {
        $backgroundPicture->load('media', 'source');

        return view('admin.background-pictures.show', compact('backgroundPicture'));
    }

    public function edit(BackgroundPicture $backgroundPicture): View {
        $backgroundPicture->load('source');

        return view('admin.background-pictures.edit', compact('backgroundPicture'));
    }

    public function update(BackgroundPictureRequest $request, BackgroundPicture $backgroundPicture): RedirectResponse {
        $validated = $request->validated();

        $backgroundPicture->update(BackgroundPicture::sanitize($validated));
        $backgroundPicture->source()->update(Source::sanitize($validated));
        $backgroundPicture->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handleCropPicture($backgroundPicture, $request);

        toastr()->success((string) __('app.background-picture.update'));
        return to_route('background-pictures.index');
    }

    public function destroy(BackgroundPicture $backgroundPicture): RedirectResponse {
        $backgroundPicture->source()->delete();
        $backgroundPicture->delete();
        $backgroundPicture->clearMediaCollection($backgroundPicture->collectionName);

        toastr()->success((string) __('app.background-picture.delete'));
        return to_route('background-pictures.index');
    }
}
