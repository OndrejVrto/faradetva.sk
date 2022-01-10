<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::latest()->paginate(10);

        return view('backend.tags.index', compact('tags'));
    }

    public function create() {
        return view('backend.tags.create');
    }

    public function store(TagRequest $request) {
        $validated = $request->validated();
        Tag::create($validated);

        return redirect()->route('tags.index')->with([
            'message' => 'Nové kľúčové slovo bolo pridané!',
            'alert-type' => 'success'
		]);
    }

    public function edit($slug) {
        $tag = Tag::whereSlug($slug)->firstOrFail();

        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id) {
        $validated = $request->validated();
        Tag::findOrFail($id)->update($validated);

        return redirect()->route('tags.index')->with([
            'message' => 'Kľúčové slovo bolo upravené.',
            'alert-type' => 'success'
		]);

    }

    public function destroy(Tag $tag) {
        $tag->delete();

        return redirect()->route('tags.index')->with([
            'message' => 'Kľúčové slovo bolo odstránené!',
            'alert-type' => 'success'
		]);
    }
}
