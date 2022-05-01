<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Priest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PriestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PriestController extends Controller
{
    public function index(Request $request): View {
        $priests = Priest::query()
            ->latest()
            ->with('media')
            ->archive($request, 'priests')
            ->paginate(5)
            ->withQueryString();

        return view('backend.priests.index', compact('priests'));
    }

    public function create(): View  {
        return view('backend.priests.create');
    }

    public function store(PriestRequest $request): RedirectResponse {
        $validated = $request->validated();
        $priest = Priest::create(Priest::sanitize($validated));

        (new MediaStoreService)->handleCropPicture($priest, $request, $priest->full_name_titles.'-'.$priest->function);

        toastr()->success(__('app.priest.store'));
        return to_route('priests.index');
    }

    public function edit(Priest $priest): View  {
        return view('backend.priests.edit', compact('priest'));
    }

    public function update(PriestRequest $request, Priest $priest): RedirectResponse {
        $validated = $request->validated();
        $priest->update($validated);

        (new MediaStoreService)->handleCropPicture($priest, $request, $priest->full_name_titles.'-'.$priest->function);

        toastr()->success(__('app.priest.update'));
        return to_route('priests.index');
    }

    public function destroy(Priest $priest): RedirectResponse {
        $priest->delete();

        toastr()->success(__('app.priest.delete'));
        return to_route('priests.index');
    }

    public function restore($id): RedirectResponse {
        $priest = Priest::onlyTrashed()->findOrFail($id);
        $priest->slug = Str::slug($priest->full_name_titles).'-'.Str::random(5);
        $priest->titles_before = '*'.$priest->titles_before;
        $priest->restore();

        toastr()->success(__('app.priest.restore'));
        return to_route('priests.edit', $priest->slug);
    }

    public function force_delete($id): RedirectResponse {
        $priest = Priest::onlyTrashed()->findOrFail($id);
        $priest->clearMediaCollection($priest->collectionName);
        $priest->forceDelete();

        toastr()->success(__('app.priest.force-delete'));
        return to_route('priests.index');
    }
}
