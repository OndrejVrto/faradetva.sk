<?php

namespace App\Http\Controllers\Backend;

use App\Models\Priest;

use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PriestRequest;
use Illuminate\Support\Facades\Session;

class PriestController extends Controller
{
    public function index() {
        $priests = Priest::latest()->with('media')->paginate(5);

        Session::remove('priest_old_input_checkbox');

        return view('backend.priests.index', compact('priests'));
    }

    public function create() {
        return view('backend.priests.create');
    }

    public function store(PriestRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $priest = Priest::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($priest, 'priest', 'photo');
        }

        toastr()->success(__('app.priest.store'));
        return redirect()->route('priests.index');
    }

    public function edit(Priest $priest) {
        return view('backend.priests.edit', compact('priest'));
    }

    public function update(PriestRequest $request, Priest $priest, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $priest->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($priest, 'priest', 'photo');
        }

        toastr()->success(__('app.priest.update'));
        return redirect()->route('priests.index');
    }

    public function destroy(Priest $priest) {
        $priest->delete();
        $priest->clearMediaCollection('priest');

        toastr()->success(__('app.priest.delete'));
        return redirect()->route('priests.index');
    }
}
