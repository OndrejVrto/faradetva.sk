<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use App\Models\NewsTags;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$all_news = News::with('user')->latest()->paginate(10);

		return view('news.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

		$categories = Category::all()->pluck('title')->toArray();

		$tags = Tag::all();

		return view('news.create', compact('categories', 'tags'));
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

		$news = new News;
		$news->category_id = $request->category_id;
		$news->title = $request->title;
		$news->content = $request->content;
		$this->user_id = Auth::user()->id;
		$news->save();

		$tags = $request->input('tags');

		foreach( $tags as $tag_id ) {
			NewsTags::create([
				'news_id' => $news->id,
				'tags_id' => $tag_id
			]);
		}

        return redirect()->route('news.index')->with('success', 'Nový článok bol uložený!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
		$news = News::whereSlug($slug)->firstOrFail();

		return view('news.edit', compact('news'));
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
		// TODO save with tags

		News::findOrFail($id)->update($validated);

        return redirect()->route('news.index')->with('success', 'Článok bol úspešne zmenený!');

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

		return redirect()->route('news.index')->with('success','Článok bol úspešne odstránený.');
    }

}
