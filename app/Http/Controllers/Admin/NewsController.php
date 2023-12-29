<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\News;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\NewsRequest;
use App\Services\FilenameSanitize;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\Support\MediaStream;

class NewsController extends Controller {
    public function index(Request $request): View {
        $allNews = News::query()
            ->orderByDesc('prioritized')
            ->latest()
            ->withCount('document')
            ->withCount('album')
            ->with('user', 'media')
            ->archive($request, 'news')
            ->paginate(8)
            ->withQueryString();

        return view('admin.news.index', compact('allNews'));
    }

    public function create(): View {
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = [];
        $documents = null;
        $pictures = null;

        return view('admin.news.create', compact('documents', 'pictures', 'categories', 'tags', 'selectedTags'));
    }

    public function storeMedia(Request $request): JsonResponse {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($request->hasFile('doc')) {
            /** @var \Illuminate\Http\UploadedFile $file  */
            $file = $request->file('doc');
            // sanitize filename
            $name = (new FilenameSanitize())($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } else {
            // no file
            return response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    public function storeAlbum(Request $request): JsonResponse {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($request->hasFile('album-picture')) {
            /** @var \Illuminate\Http\UploadedFile $file  */
            $file = $request->file('album-picture');
            // sanitize filename
            $name = (new FilenameSanitize())($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } else {
            // no file
            return response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    public function store(NewsRequest $request): RedirectResponse {
        $validated = $request->validated() + [ 'user_id' => auth()->id() ];

        $news = News::create(News::sanitize($validated));
        $news->tags()->syncWithoutDetaching($request->input('tags'));
        $news->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($news, $request);

        foreach ($request->input('document', []) as $file) {
            $news
                ->addMedia(storage_path('tmp/uploads/' . $file))
                ->toMediaCollection($news->collectionDocument);
        }

        foreach ($request->input('picture', []) as $picture) {
            $news
                ->addMedia(storage_path('tmp/uploads/' . $picture))
                ->toMediaCollection($news->collectionAlbum);
        }

        toastr()->success(__('app.news.store'));
        return to_route('news.index');
    }

    public function edit(News $news): View {
        $this->authorize('view', $news);

        $news->load('media', 'tags');
        $pictures = $news->getMedia($news->collectionAlbum);
        $documents = $news->getMedia($news->collectionDocument);
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $news->tags->pluck('id')->unique()->toArray();

        return view('admin.news.edit', compact('news', 'documents', 'pictures', 'categories', 'tags', 'selectedTags'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse {
        $validated = $request->validated();

        $news->update(News::sanitize($validated));
        $news->tags()->sync($request->input('tags'));
        $news->source()->update(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($news, $request);

        if ((is_countable($news->document) ? count($news->document) : 0) > 0) {
            foreach ($news->document as $oldDocument) {
                if (!in_array($oldDocument->file_name, $request->input('document', []))) {
                    $oldDocument->delete();
                }
            }
        }

        $oldDocument = $news->document->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if ((is_countable($oldDocument) ? count($oldDocument) : 0) === 0 || !in_array($file, $oldDocument)) {
                $news
                    ->addMedia(storage_path('tmp/uploads/' . $file))
                    ->toMediaCollection($news->collectionDocument);
            }
        }

        if ((is_countable($news->album) ? count($news->album) : 0) > 0) {
            foreach ($news->album as $oldAlbumImage) {
                if (!in_array($oldAlbumImage->file_name, $request->input('picture', []))) {
                    $oldAlbumImage->delete();
                }
            }
        }

        $oldAlbumImage = $news->album->pluck('file_name')->toArray();

        foreach ($request->input('picture', []) as $picture) {
            if ((is_countable($oldAlbumImage) ? count($oldAlbumImage) : 0) === 0 || !in_array($picture, $oldAlbumImage)) {
                $news
                    ->addMedia(storage_path('tmp/uploads/' . $picture))
                    ->toMediaCollection($news->collectionAlbum);
            }
        }

        toastr()->success(__('app.news.update'));
        return to_route('news.index');
    }

    public function download(News $news): MediaStream {
        $downloads = $news->getMedia($news->collectionDocument);

        return MediaStream::create('Prilohy_'.$news->slug.'.zip')->addMedia($downloads);
    }

    public function downloadAlbum(News $news): MediaStream {
        $downloads = $news->getMedia($news->collectionAlbum);

        return MediaStream::create('Album_'.$news->slug.'.zip')->addMedia($downloads);
    }

    public function destroy(News $news): RedirectResponse {
        $this->authorize('delete', $news);
        $news->delete();

        toastr()->success(__('app.news.delete'));
        return to_route('news.index');
    }

    public function restore(int $id): RedirectResponse {
        $news = News::onlyTrashed()->findOrFail($id);
        $news->slug = Str::slug($news->title).'-'.Str::random(5);
        $news->title = '*'.$news->title;
        $news->restore();

        toastr()->success(__('app.news.restore'));
        return to_route('news.edit', $news->slug);
    }

    public function force_delete(int $id): RedirectResponse {
        $news = News::onlyTrashed()->findOrFail($id);
        $news->tags()->detach($news->id);
        $news->clearMediaCollection($news->collectionName);
        $news->clearMediaCollection($news->collectionAlbum);
        $news->clearMediaCollection($news->collectionDocument);
        $news->forceDelete();

        toastr()->success(__('app.news.force-delete'));
        return to_route('news.index', ['only-deleted' => 'true']);
    }
}
