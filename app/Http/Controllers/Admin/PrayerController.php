<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Prayer;
use App\Models\Source;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrayerRequest;
use Illuminate\Http\RedirectResponse;

class PrayerController extends Controller {
    public function index(Request $request): View {
        $prayers = Prayer::query()
            ->latest('updated_at')
            ->with('media', 'source')
            ->archive($request, 'prayers')
            ->paginate(5)
            ->withQueryString();

        return view('admin.prayers.index', compact('prayers'));
    }

    public function create(): View {
        return view('admin.prayers.create');
    }

    public function store(PrayerRequest $request): RedirectResponse {
        $validated = $request->validated();

        $prayer = Prayer::create(Prayer::sanitize($validated));
        $prayer->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($prayer, $request);

        toastr()->success(strval(__('app.prayer.store')));
        return to_route('prayers.index');
    }

    public function edit(Prayer $prayer): View {
        $prayer->load('source');

        return view('admin.prayers.edit', compact('prayer'));
    }

    public function update(PrayerRequest $request, Prayer $prayer): RedirectResponse {
        $validated = $request->validated();

        $prayer->update(Prayer::sanitize($validated));
        $prayer->source()->update(Source::sanitize($validated));
        $prayer->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handleCropPicture($prayer, $request);

        toastr()->success(strval(__('app.prayer.update')));
        return to_route('prayers.index');
    }

    public function destroy(Prayer $prayer): RedirectResponse {
        $prayer->delete();

        toastr()->success(strval(__('app.prayer.delete')));
        return to_route('prayers.index');
    }

    public function restore($id): RedirectResponse {
        $prayer = Prayer::onlyTrashed()->findOrFail($id);
        $prayer->slug = Str::slug($prayer->title).'-'.Str::random(5);
        $prayer->title = '*'.$prayer->title;
        $prayer->restore();

        toastr()->success(strval(__('app.prayer.restore')));
        return to_route('prayers.edit', $prayer->slug);
    }

    public function force_delete($id): RedirectResponse {
        $prayer = Prayer::onlyTrashed()->findOrFail($id);
        $prayer->source()->delete();
        $prayer->clearMediaCollection($prayer->collectionName);
        $prayer->forceDelete();

        toastr()->success(strval(__('app.prayer.force-delete')));
        return to_route('prayers.index', ['only-deleted' => 'true']);
    }
}
