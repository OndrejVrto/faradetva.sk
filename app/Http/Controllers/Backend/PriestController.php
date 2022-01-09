<?php

namespace App\Http\Controllers\Backend;

use App\Models\Priest;

use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use App\Http\Requests\PriestRequest;
use Illuminate\Support\Facades\Session;

class PriestController extends Controller
{


    public function index()
    {
        Session::remove('priest_old_input_checkbox');

        $priests = Priest::latest()->with('media')->paginate(5);
        return view('backend.priests.index', compact('priests'));
    }



    public function create()
    {
        return view('backend.priests.create');
    }



    public function store(PriestRequest $request)
    {
        $validated = $request->validated();
        $priest = Priest::create($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
            $priest->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('priest');
        }


        $notification = array(
            'message' => 'Nový kňaz bol pridaný!',
            'alert-type' => 'success'
        );
        return redirect()->route('priests.index')->with($notification);
    }



    public function edit($slug)
    {
        $priest = Priest::whereSlug($slug)->firstOrFail();

        return view('backend.priests.edit', compact('priest'));
    }



    public function update(PriestRequest $request, $id)
    {
        $validated = $request->validated();

        $priest = Priest::findOrFail($id);
        $priest->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
            $priest->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('priest');
        }

        $notification = array(
            'message' => 'Informácie o kňazovi boli upravené.',
            'alert-type' => 'success'
        );
        return redirect()->route('priests.index')->with($notification);
    }



    public function destroy($id)
    {
        $priest = Priest::findOrFail($id);
        $priest->delete();
        $priest->clearMediaCollection('priest');

        $notification = array(
            'message' => 'Informácia o kňazovi našej farnosti bola odstránená!',
            'alert-type' => 'success'
        );
        return redirect()->route('priests.index')->with($notification);
    }

}
