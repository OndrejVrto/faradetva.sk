<?php

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

        toastr()->success('Nová kategória bola pridaná!');
        return redirect()->route('categories.index');
    }

    public function edit($slug) {
        $category = Category::whereSlug($slug)->firstOrFail();

        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $validated = $request->validated();
        Category::findOrFail($id)->update($validated);

        toastr()->success('Kategória bola upravená!');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category) {
        $category->delete();

        toastr()->success('Kategória bola odstránená!');
        return redirect()->route('categories.index');
    }
}
