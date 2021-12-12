<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use App\Models\NewsTag;
use App\Models\Category;
use App\Service\UploadFileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

	protected $upload;

	public function __construct(UploadFileService $upload)
	{
		$this->upload = $upload;
	}


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
		$request->validated();

		// store news
		$news = new News;
		$news->category_id = $request->category_id;
		$news->title = $request->title;
		$news->content = $request->content;
		$news->user_id = Auth::id();
		$news->save();

		// store tags
		$tags = $request->input('tags');
		$news->tags()->sync($tags);

		//upload files
		$this->upload->uploadFiles($news, $request->file('file_news'));

		// notification and request
		$notification = array(
			'message' => 'Nový článok bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('news.index')->with($notification);
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

		$request->validated();

		$news = News::findOrFail($id);
		$news->category_id = $request->category_id;
		$news->title = $request->title;
		$news->content = $request->content;
		$news->user_id = Auth::id();
		$news->save();

		$tags = $request->input('tags');
		$news->tags()->sync($tags);

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

		$notification = array(
			'message' => 'Článok bol odstránený.',
			'alert-type' => 'success'
		);
		return redirect()->route('news.index')->with($notification);
    }

}
