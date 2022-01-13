<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;

use App\Models\News;
use App\Models\Category;
use App\Http\Requests\NewsRequest;
use App\Services\MediaStoreService;
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

    public function store(NewsRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $news = News::create($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        if ($request->hasFile('news_picture')) {
            $mediaService->storeMediaOneFile($news, 'news_front_picture', 'news_picture' );
        }

        if ($request->hasFile('files')) {
            $mediaService->storeMediaFiles($news, 'news_file', $request->file('files'),  $request->filesDescription_new );
        }

        toastr()->success(__('app.news.store'));
        return redirect()->route('news.index');
    }

    public function edit(News $news) {
        $news->load('media', 'tags');
        $files = $news->getMedia('news_file');
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $news->tags->pluck('id')->unique()->toArray();

        return view('backend.news.edit', compact('news', 'files', 'categories', 'tags', 'selectedTags'));
    }

    public function update(NewsRequest $request, News $news, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $news->update($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        if ($request->hasFile('news_picture')) {
            $mediaService->storeMediaOneFile($news, 'news_front_picture', 'news_picture');
        }

        if ($request->hasFile('files')) {
            $mediaService->storeMediaFiles($news, 'news_file', $request->file('files'),  $request->filesDescription_new );
        }

        toastr()->success(__('app.news.update'));
        return redirect()->route('news.index');
    }

    public function destroy(News $news) {
        $news->delete();
        $news->clearMediaCollection('news_picture');

        toastr()->success(__('app.news.delete'));
        return redirect()->route('news.index');
    }
}
