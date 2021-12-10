<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

		$validated = $request->validated();

		Category::create($validated);

		$notification = array(
			'message' => 'Nová kategória bola pridaná!',
			'alert-type' => 'success'
		);

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug )
    {

		$category = Category::whereSlug($slug)->firstOrFail();

		return view('categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {

		$validated = $request->validated();

		Category::findOrFail($id)->update($validated);

		$notification = array(
			'message' => 'Kategória bola upravená!',
			'alert-type' => 'success'
		);

        return redirect()->route('categories.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
