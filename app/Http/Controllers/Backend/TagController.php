<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$tags = Tag::latest()->paginate(10);
        return view('backend.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

		$validated = $request->validated();

		Tag::create($validated);

		$notification = array(
			'message' => 'Nové kľúčové slovo bolo pridané!',
			'alert-type' => 'success'
		);
        return redirect()->route('tags.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$tag = Tag::whereSlug($slug)->firstOrFail();

		return view('backend.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TagRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {

		$validated = $request->validated();

		Tag::findOrFail($id)->update($validated);

		$notification = array(
			'message' => 'Kľúčové slovo bolo upravené.',
			'alert-type' => 'success'
		);
        return redirect()->route('tags.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$tag = Tag::findOrFail($id);
		$tag->delete();

		$notification = array(
			'message' => 'Kľúčové slovo bolo odstránené!',
			'alert-type' => 'success'
		);
		return redirect()->route('tags.index')->with($notification);
    }

}
