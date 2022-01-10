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

        toastr()->success('Nové kľúčové slovo bolo pridané!');
        return redirect()->route('tags.index');
    }

    public function edit($slug) {
        $tag = Tag::whereSlug($slug)->firstOrFail();

        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id) {
        $validated = $request->validated();
        Tag::findOrFail($id)->update($validated);

        toastr()->success('Kľúčové slovo bolo upravené.');
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        toastr()->success('Kľúčové slovo bolo odstránené!');
        return redirect()->route('tags.index');
    }
}