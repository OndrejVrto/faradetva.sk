<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Prayer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrayerRequest;
use Illuminate\Http\RedirectResponse;

class PrayerController extends Controller
{
    public function index(Request $request): View {
        $prayers = Prayer::query()
            ->latest('updated_at')
            ->with('media', 'source')
            ->archive($request, 'prayers')
            ->paginate(5)
            ->withQueryString();

        return view('backend.prayers.index', compact('prayers'));
    }

    public function create(): View {
        return view('backend.prayers.create');
    }

    public function store(PrayerRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $prayer = Prayer::create($validated);
        $sourceData = Arr::only($validated, ['description', 'author', 'author_url', 'source', 'source_url', 'license', 'license_url',]);
        $prayer->source()->create($sourceData);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($prayer, $prayer->collectionName, 'photo');
        }

        toastr()->success(__('app.prayer.store'));
        return to_route('prayers.index');
    }

    public function show(Prayer $prayer): View {
        $prayer->load('media', 'source');

        return view('backend.prayers.show', compact('prayer'));
    }

    public function edit(Prayer $prayer): View {
        $prayer->load('source');

        return view('backend.prayers.edit', compact('prayer'));
    }

    public function update(PrayerRequest $request, Prayer $prayer, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $prayer->update($validated);
        $sourceData = Arr::only($validated, ['description', 'author', 'author_url', 'source', 'source_url', 'license', 'license_url',]);
        $prayer->source()->update($sourceData);
        $prayer->touch(); // Touch because i need start observer for delete cache

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($prayer, $prayer->collectionName, 'photo');
        }

        toastr()->success(__('app.prayer.update'));
        return to_route('prayers.index');
    }

    public function destroy(Prayer $prayer): RedirectResponse {
        $prayer->delete();

        toastr()->success(__('app.prayer.delete'));
        return to_route('prayers.index');
    }

    public function restore($id): RedirectResponse {
        $prayer = Prayer::onlyTrashed()->findOrFail($id);
        $prayer->slug = Str::slug($prayer->title).'-'.Str::random(5);
        $prayer->title = '*'.$prayer->title;
        $prayer->restore();

        toastr()->success(__('app.prayer.restore'));
        return to_route('prayers.edit', $prayer->slug);
    }

    public function force_delete($id): RedirectResponse {
        $prayer = Prayer::onlyTrashed()->findOrFail($id);
        $prayer->source()->delete();
        $prayer->clearMediaCollection($prayer->collectionName);
        $prayer->forceDelete();

        toastr()->success(__('app.prayer.force-delete'));
        return to_route('prayers.index');
    }
}
