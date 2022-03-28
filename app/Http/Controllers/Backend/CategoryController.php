<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(Request $request): View {
        $categories = Category::query()
            ->latest()
            ->archive($request, 'categories')
            ->paginate(10)
            ->withQueryString();

        return view('backend.categories.index', compact('categories'));
    }

    public function create(): View  {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse {
        $validated = $request->validated();
        Category::create($validated);

        toastr()->success(__('app.category.store'));
        return to_route('categories.index');
    }

    public function edit(Category $category): View|RedirectResponse  {
        if ($category->id = 1 AND auth()->user()->id != 1) {
            toastr()->error(__('app.category.update-error', ['name'=> $category->title]));
            return to_route('categories.index');
        }

        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse {
        $validated = $request->validated();
        $category->update($validated);

        toastr()->success(__('app.category.update'));
        return to_route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse {
        if ($category->id == 1) {
            toastr()->error(__('app.category.delete-error', ['name'=> $category->title]));
        } else {
            $category->delete();
            toastr()->success(__('app.category.delete'));
        }

        return to_route('categories.index');
    }

    public function restore($id): RedirectResponse {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->slug = Str::slug($category->title).'-'.Str::random(5);
        $category->title = '*'.$category->title;
        $category->restore();

        toastr()->success(__('app.category.restore'));
        return to_route('categories.edit', $category->slug);
    }

    public function force_delete($id): RedirectResponse {
        $category = Category::onlyTrashed()->findOrFail($id);

        $category->news()->update(['category_id' => 1]);
        $category->forceDelete();

        toastr()->success(__('app.category.force-delete'));
        return to_route('categories.index');
    }
}
