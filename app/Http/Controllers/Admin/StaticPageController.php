<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Source;
use App\Enums\PageType;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StaticPageRequest;

class StaticPageController extends Controller {
    public function index(Request $request): View {
        $pages = StaticPage::query()
            ->orderByDesc('virtual')
            ->orderBy('url')
            ->with('media', 'source')
            ->withCount('banners')
            ->withCount('faqs')
            ->archive($request, 'pages')
            ->filterDeactivated($request)
            ->get();

        return view('admin.static-pages.index', compact('pages'));
    }

    public function create(): View {
        $banners = Banner::with('media', 'source')->get();
        $selectedBanners = [];
        $pageTypes = PageType::cases();

        return view('admin.static-pages.create', compact('banners', 'selectedBanners', 'pageTypes'));
    }

    public function store(StaticPageRequest $request): RedirectResponse {
        $validated = $request->validated();

        $staticPage = StaticPage::create(StaticPage::sanitize($validated));
        $staticPage->source?->create(Source::sanitize($validated));
        $staticPage->banners()->syncWithoutDetaching($request->input('banner'));

        (new MediaStoreService())->handleCropPicture($staticPage, $request);

        toastr()->success(__('app.static-page.store'));
        return to_route('static-pages.index');
    }

    public function edit(StaticPage $staticPage): View {
        $staticPage->load('banners', 'source');
        $banners = Banner::with('media', 'source')->get();
        $selectedBanners = $staticPage->banners->pluck('id')->unique()->toArray();
        $pageTypes = PageType::cases();

        return view('admin.static-pages.edit', compact('staticPage', 'banners', 'selectedBanners', 'pageTypes'));
    }

    public function update(StaticPageRequest $request, StaticPage $staticPage): RedirectResponse {
        $validated = $request->validated();

        $staticPage->update(StaticPage::sanitize($validated));
        if ($staticPage->source()->exists()) {
            $staticPage->source()->update(Source::sanitize($validated));
        } else {
            $staticPage->source()->create(Source::sanitize($validated));
        }
        $staticPage->banners()->sync($request->input('banner'));
        $staticPage->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handleCropPicture($staticPage, $request);

        toastr()->success(__('app.static-page.update'));
        return to_route('static-pages.index');
    }

    public function destroy(StaticPage $staticPage): RedirectResponse {
        $staticPage->delete();

        toastr()->success(__('app.static-page.delete'));
        return to_route('static-pages.index');
    }

    public function restore(int $id): RedirectResponse {
        $staticPage = StaticPage::onlyTrashed()->findOrFail($id);
        $staticPage->slug = Str::slug(Str::replace('/', '-', $staticPage->url)).'-'.Str::random(5);
        $staticPage->title = '*'.$staticPage->title;
        $staticPage->restore();

        toastr()->success(__('app.static-page.restore'));
        return to_route('static-pages.edit', $staticPage->slug);
    }

    public function force_delete(int $id): RedirectResponse {
        $staticPage = StaticPage::onlyTrashed()->findOrFail($id);
        $staticPage->source()->delete();
        $staticPage->clearMediaCollection($staticPage->collectionName);
        $staticPage->banners()->detach($id);
        $staticPage->forceDelete();

        toastr()->success(__('app.static-page.force-delete'));
        return to_route('static-pages.index', ['only-deleted' => 'true']);
    }
}
