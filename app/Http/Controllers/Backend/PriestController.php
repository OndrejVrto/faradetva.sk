<?php

namespace App\Http\Controllers\Backend;

use App\Models\Priest;

use App\Http\Helpers\DataFormater;
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

    public function store(PriestRequest $request) {
        $validated = $request->validated();
        $priest = Priest::create($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
            $priest->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('priest');
        }

        toastr()->success('Nový kňaz bol pridaný!');
        return redirect()->route('priests.index');
    }

    public function edit($slug) {
        $priest = Priest::whereSlug($slug)->firstOrFail();

        return view('backend.priests.edit', compact('priest'));
    }

    public function update(PriestRequest $request, $id) {
        $validated = $request->validated();

        $priest = Priest::findOrFail($id);
        $priest->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
            $priest->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('priest');
        }

        toastr()->success('Informácie o kňazovi boli upravené.');
        return redirect()->route('priests.index');
    }

    public function destroy(Priest $priest) {
        $priest->delete();
        $priest->clearMediaCollection('priest');

        toastr()->success('Informácia o kňazovi našej farnosti bola odstránená!');
        return redirect()->route('priests.index');
    }
}
