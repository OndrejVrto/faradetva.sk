<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View  {
        $categories = Category::latest()->paginate(10);

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

    public function edit(Category $category): View  {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse {
        $validated = $request->validated();
        $category->update($validated);

        toastr()->success(__('app.category.update'));
        return to_route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse {
        $category->delete();

        toastr()->success(__('app.category.delete'));
        return to_route('categories.index');
    }
}
