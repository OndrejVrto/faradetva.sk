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
    public function index() {
        $allNews = News::latest('updated_at')->with('user', 'media')->paginate(5);

        Session::remove('news_old_input_checkbox');

        return view('backend.news.index', compact('allNews'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = [];

        return view('backend.news.create', compact('categories', 'tags', 'selectedTags'));
    }

    public function store(NewsRequest $request) {
        $validated = $request->validated();
        $news = News::create($validated);

        // store tags
        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        // Spatie media-collection
        if ($request->hasFile('news_picture')) {
            $news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
            $news->addMediaFromRequest('news_picture')
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                ->toMediaCollection('news_front_picture');
        }

        toastr()->success('Nový článok bol pridaný!');
        return redirect()->route('news.index');
    }

    public function edit($slug) {
        $news = News::whereSlug($slug)->with('media')->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();

        // TODO: Treba model NewsTag ?? - zmazať ??  - Zatial asi potrebný pre seeder
        $selectedTags = NewsTag::where('news_id', $news->id )->pluck('tag_id')->toArray();

        return view('backend.news.edit', compact('news', 'categories', 'tags', 'selectedTags'));
    }

    public function update(NewsRequest $request, $id) {
        $validated = $request->validated();
        $news = News::findOrFail($id);
        $news->update($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        // Spatie media-collection
        if ($request->hasFile('news_picture')) {
            $news->clearMediaCollectionExcept('news_front_picture', $news->getFirstMedia());
            $news->addMediaFromRequest('news_picture')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('news_front_picture');
        }

        toastr()->success('Článok bol úspešne upravený.');
        return redirect()->route('news.index');

    }

    public function destroy(News $news) {
        $news->delete();
        $news->clearMediaCollection('news_picture');

        toastr()->success('Článok bol odstránený.');
        return redirect()->route('news.index');
    }
}