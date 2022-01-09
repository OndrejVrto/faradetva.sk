<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;

use App\Models\News;
use App\Models\NewsTag;
use App\Models\Category;
use App\Http\Helpers\DataFormater;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function index()
    {
        Session::remove('news_old_input_checkbox');

        $all_news = News::latest('updated_at')->with('user', 'media')->paginate(5);
        return view('backend.news.index', compact('all_news'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = [];

        return view('backend.news.create', compact('categories', 'tags', 'selectedTags'));
    }

    public function store(NewsRequest $request)
    {
        $validated = $request->validated();
        $news = News::create($validated);

        // store tags
        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        // Spatie media-collection
        if ($request->hasFile('news_picture')) {
            $news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
            $news->addMediaFromRequest('news_picture')
                ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                ->toMediaCollection('news_front_picture');
        }

        // notification and request
        $notification = array(
            'message' => 'Nový článok bol pridaný!',
            'alert-type' => 'success'
        );
        return redirect()->route('news.index')->with($notification);
    }

    public function show($slug)
    {
        $one_news = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
        $last_news = News::whereActive(1)->orderBy('updated_by', 'asc')->take(3)->with('media')->get();
        $all_categories = Category::all();
        $all_tags = Tag::all();

        // dd($last_news);
        return view('frontend.news.show', compact('one_news', 'last_news', 'all_categories', 'all_tags'));
    }

    public function edit($slug)
    {
        $news = News::whereSlug($slug)->with('media')->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = NewsTag::where('news_id', $news->id )->pluck('tag_id')->toArray();

        return view('backend.news.edit', compact('news', 'categories', 'tags', 'selectedTags'));
    }

    public function update(NewsRequest $request, $id)
    {

        $validated = $request->validated();
        $news = News::findOrFail($id);
        $news->update($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        // Spatie media-collection
        if ($request->hasFile('news_picture')) {
            $news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
            $news->addMediaFromRequest('news_picture')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('news_front_picture');
        }

        $notification = array(
            'message' => 'Článok bol úspešne upravený.',
            'alert-type' => 'success'
        );
        return redirect()->route('news.index')->with($notification);

    }

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
