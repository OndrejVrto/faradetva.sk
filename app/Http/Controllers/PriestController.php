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
		$priests = Priest::latest()->paginate(10);
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

		Priest::create($validated);

		$notification = array(
			'message' => 'Nový kňaz bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('priests.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function show(Priest $priest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function edit(Priest $priest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePriestRequest  $request
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function update(StorePriestRequest $request, Priest $priest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priest $priest)
    {
        //
    }
}
