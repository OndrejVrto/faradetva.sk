<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::latest()->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {

        $validated = $request->validated();

        Category::create($validated);

        $notification = array(
            'message' => 'Nová kategória bola pridaná!',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function edit( $slug )
    {

        $category = Category::whereSlug($slug)->firstOrFail();

        return view('backend.categories.edit', compact('category'));

    }

    public function update(CategoryRequest $request, $id)
    {

        $validated = $request->validated();

        Category::findOrFail($id)->update($validated);

        $notification = array(
            'message' => 'Kategória bola upravená!',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Kategória bola odstránená!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }

}
