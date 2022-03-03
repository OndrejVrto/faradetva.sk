<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Priest;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PriestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PriestController extends Controller
{
    public function index(): View  {
        $priests = Priest::latest()->with('media')->paginate(5);

        return view('backend.priests.index', compact('priests'));
    }

    public function create(): View  {
        return view('backend.priests.create');
    }

    public function store(PriestRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $priest = Priest::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($priest, $priest->collectionName, 'photo');
        }

        toastr()->success(__('app.priest.store'));
        return to_route('priests.index');
    }

    public function edit(Priest $priest): View  {
        return view('backend.priests.edit', compact('priest'));
    }

    public function update(PriestRequest $request, Priest $priest, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $priest->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($priest, $priest->collectionName, 'photo');
        }

        toastr()->success(__('app.priest.update'));
        return to_route('priests.index');
    }

    public function destroy(Priest $priest): RedirectResponse {
        $priest->delete();
        $priest->clearMediaCollection($priest->collectionName);

        toastr()->success(__('app.priest.delete'));
        return to_route('priests.index');
    }
}
