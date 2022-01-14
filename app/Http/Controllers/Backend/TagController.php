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

        toastr()->success(__('app.tag.store'));
        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag) {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag) {
        $validated = $request->validated();
        $tag->update($validated);

        toastr()->success(__('app.tag.update'));
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        toastr()->success(__('app.tag.delete'));
        return redirect()->route('tags.index');
    }
}
