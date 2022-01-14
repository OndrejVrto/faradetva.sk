<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::latest()->paginate(10);

        return view('backend.categories.index', compact('categories'));
    }

    public function create() {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request) {
        $validated = $request->validated();
        Category::create($validated);

        toastr()->success(__('app.category.store'));
        return redirect()->route('categories.index');
    }

    public function edit(Category $category) {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category) {
        $validated = $request->validated();
        $category->update($validated);

        toastr()->success(__('app.category.update'));
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category) {
        $category->delete();

        toastr()->success(__('app.category.delete'));
        return redirect()->route('categories.index');
    }
}
