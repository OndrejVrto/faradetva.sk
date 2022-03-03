<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index(): View  {
        $tags = Tag::latest()->paginate(10);

        return view('backend.tags.index', compact('tags'));
    }

    public function create(): View  {
        return view('backend.tags.create');
    }

    public function store(TagRequest $request): RedirectResponse {
        $validated = $request->validated();
        Tag::create($validated);

        toastr()->success(__('app.tag.store'));
        return to_route('tags.index');
    }

    public function edit(Tag $tag): View  {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse {
        $validated = $request->validated();
        $tag->update($validated);

        toastr()->success(__('app.tag.update'));
        return to_route('tags.index');
    }

    public function destroy(Tag $tag): RedirectResponse {
        $tag->delete();

        toastr()->success(__('app.tag.delete'));
        return to_route('tags.index');
    }
}
