<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index(Request $request): View {
        $tags = Tag::query()
            ->latest()
            ->archive($request, 'tags')
            ->paginate(10)
            ->withQueryString();

        return view('admin.tags.index', compact('tags'));
    }

    public function create(): View  {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request): RedirectResponse {
        $validated = $request->validated();
        Tag::create(Tag::sanitize($validated));

        toastr()->success(__('app.tag.store'));
        return to_route('tags.index');
    }

    public function edit(Tag $tag): View  {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse {
        $validated = $request->validated();
        $tag->update(Tag::sanitize($validated));

        toastr()->success(__('app.tag.update'));
        return to_route('tags.index');
    }

    public function destroy(Tag $tag): RedirectResponse {
        $tag->delete();

        toastr()->success(__('app.tag.delete'));
        return to_route('tags.index');
    }

    public function restore($id): RedirectResponse {
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->slug = Str::slug($tag->title).'-'.Str::random(5);
        $tag->title = '*'.$tag->title;
        $tag->restore();

        toastr()->success(__('app.tag.restore'));
        return to_route('tags.edit', $tag->slug);
    }

    public function force_delete($id): RedirectResponse {
        $tag = Tag::onlyTrashed()->findOrFail($id);
        $tag->forceDelete();

        toastr()->success(__('app.tag.force-delete'));
        return to_route('tags.index', ['only-deleted' => 'true']);
    }
}
