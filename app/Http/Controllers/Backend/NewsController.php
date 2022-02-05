<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Helpers\DataFormater;
use App\Http\Requests\NewsRequest;
use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function index() {
        $allNews = News::latest()->with('user', 'media')->paginate(5);

        Session::remove('news_old_input_checkbox');

        return view('backend.news.index', compact('allNews'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = [];

        return view('backend.news.create', compact('categories', 'tags', 'selectedTags'));
    }

    public function storeMedia(Request $request) {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('doc');
        // $name = uniqid() . '_' . trim($file->getClientOriginalName());

        // sanitize filename
        $name = DataFormater::filterFilename($file->getClientOriginalName(), true);

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function store(NewsRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated() + [ 'user_id' => auth()->id() ];
        $news = News::create($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        if ($request->hasFile('picture')) {
            $mediaService->storeMediaOneFile($news, $news->collectionPicture, 'picture');
        }

        foreach ($request->input('document', []) as $file) {
            $news
                ->addMedia(storage_path('tmp/uploads/' . $file))
                ->toMediaCollection($news->collectionDocument);
        }

        toastr()->success(__('app.news.store'));
        return redirect()->route('news.index');
    }

    public function edit(News $news) {
        $this->authorize('view', $news);

        $news->load('media', 'tags');
        $documents = $news->getMedia($news->collectionDocument);
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $news->tags->pluck('id')->unique()->toArray();

        return view('backend.news.edit', compact('news', 'documents', 'categories', 'tags', 'selectedTags'));
    }

    public function update(NewsRequest $request, News $news, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $news->update($validated);

        $tags = $request->input('tags');
        $news->tags()->sync($tags);

        if ($request->hasFile('picture')) {
            $mediaService->storeMediaOneFile($news, $news->collectionPicture, 'picture');
        }

        if (count($news->document) > 0) {
            foreach ($news->document as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $news->document->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $news
                    ->addMedia(storage_path('tmp/uploads/' . $file))
                    ->toMediaCollection($news->collectionDocument);
            }
        }

        toastr()->success(__('app.news.update'));
        return redirect()->route('news.index');
    }

    public function destroy(News $news) {
        $this->authorize('delete', $news);

        $news->delete();
        $news->clearMediaCollection($news->collectionPicture);
        $news->clearMediaCollection($news->collectionDocument);

        toastr()->success(__('app.news.delete'));
        return redirect()->route('news.index');
    }
}
