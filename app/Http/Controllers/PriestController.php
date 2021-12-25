<?php

namespace App\Http\Controllers;

use App\Models\Priest;
use App\Http\Requests\StorePriestRequest;

class PriestController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$priests = Priest::latest()->with('media')->paginate(10);
		return view('priests.index', compact('priests'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priests.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePriestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriestRequest $request)
    {

		$validated = $request->validated();
		// dd($request);
		$priest = Priest::create($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
			$priest->addMediaFromRequest('photo')->toMediaCollection('priest');
		}


		$notification = array(
			'message' => 'Nový kňaz bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('priests.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$priest = Priest::whereSlug($slug)->firstOrFail();

		return view('priests.edit', compact('priest'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePriestRequest  $request
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function update(StorePriestRequest $request, $id)
    {
		$validated = $request->validated();

		$priest = Priest::findOrFail($id);
		$priest->update($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
			$priest->addMediaFromRequest('photo')->toMediaCollection('priest');
		}

		$notification = array(
			'message' => 'Informácie o kňazovi boli upravené.',
			'alert-type' => 'success'
		);
        return redirect()->route('priests.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
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
