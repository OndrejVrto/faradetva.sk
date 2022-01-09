<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {

        $tags = Tag::latest()->paginate(10);
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

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

    public function edit($slug)
    {
        $tag = Tag::whereSlug($slug)->firstOrFail();

        return view('backend.tags.edit', compact('tag'));
    }

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
