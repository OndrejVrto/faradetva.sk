<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use App\Models\NewsTag;
use App\Models\Category;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		Session::remove('news_old_input_checkbox');

		$all_news = News::latest('updated_at')->with('user')->with('media')->paginate(10);
		return view('news.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
		$tags = Tag::all();
		$selectedTags = [];

		return view('news.create', compact('categories', 'tags', 'selectedTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
		$validated = $request->validated();
		$news = News::create($validated);

		// store tags
		$tags = $request->input('tags');
		$news->tags()->sync($tags);

		// Spatie media-collection
		if ($request->hasFile('news_picture')) {
			$news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
			$news->addMediaFromRequest('news_picture')->toMediaCollection('news_front_picture');
		}

		// notification and request
		$notification = array(
			'message' => 'Nový článok bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('news.index')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
		$one_news = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
		$last_news = News::whereActive(1)->orderBy('updated_by', 'asc')->take(3)->with('media')->get();
		$all_categories = Category::all();
		$all_tags = Tag::all();

		// dd($last_news);
		return view('news.show', compact('one_news', 'last_news', 'all_categories', 'all_tags'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$news = News::whereSlug($slug)->with('media')->firstOrFail();
		$categories = Category::all();
		$tags = Tag::all();
		$selectedTags = NewsTag::where('news_id', $news->id )->pluck('tag_id')->toArray();

		return view('news.edit', compact('news', 'categories', 'tags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreTagRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsRequest $request, $id)
    {

		$validated = $request->validated();
		$news = News::findOrFail($id);
		$news->update($validated);

		$tags = $request->input('tags');
		$news->tags()->sync($tags);

		// Spatie media-collection
		if ($request->hasFile('news_picture')) {
			$news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
			$news->addMediaFromRequest('news_picture')->toMediaCollection('news_front_picture');
		}


		$notification = array(
			'message' => 'Článok bol úspešne upravený.',
			'alert-type' => 'success'
		);
        return redirect()->route('news.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$news = News::findOrFail($id);
		$news->delete();
		$news->clearMediaCollection('news_picture');

		$notification = array(
			'message' => 'Článok bol odstránený.',
			'alert-type' => 'success'
		);
		return redirect()->route('news.index')->with($notification);
    }

}
