<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\Source;
use App\Models\StaticPage;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
    public function index(): View  {
        $banners = Banner::query()
            ->latest('updated_at')
            ->withCount('staticPages')
            ->with('media', 'source', 'staticPages')
            ->paginate(10);

        return view('backend.banners.index', compact('banners'));
    }

    public function create(): View  {
        $pages = StaticPage::select(['id','title','description_page'])->where('check_url', '=', true)->orderBy('title')->get();
        $selectedPages = [];

        return view('backend.banners.create', compact('pages', 'selectedPages'));
    }

    public function store(BannerRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();

        $banner = Banner::create(Banner::sanitize($validated));
        $banner->staticPages()->syncWithoutDetaching($request->input('page'));
        $banner->source()->create(Source::sanitize($validated));

        $mediaService->handle($banner, $request, 'photo', $validated['slug'] );

        toastr()->success(__('app.banner.store'));
        return to_route('banners.index');
    }

    public function show(Banner $banner): View {
        $banner->load('media', 'source', 'staticPages');

        return view('backend.banners.show', compact('banner'));
    }

    public function edit(Banner $banner): View  {
        $banner->load('source');
        $pages = StaticPage::select(['id','title','description_page'])->where('check_url', '=', true)->orderBy('title')->get();
        $selectedPages = $banner->staticPages->pluck('id')->unique()->toArray();

        return view('backend.banners.edit', compact('banner', 'pages', 'selectedPages'));
    }

    public function update(BannerRequest $request, Banner $banner, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();

        $banner->update(Banner::sanitize($validated));
        $banner->source()->update(Source::sanitize($validated));
        $banner->staticPages()->sync($request->input('page'));
        $banner->touch(); // Touch because i need start observer for delete cache

        $mediaService->handle($banner, $request, 'photo', $validated['slug'] );

        toastr()->success(__('app.banner.update'));
        return to_route('banners.index');
    }

    public function destroy(Banner $banner): RedirectResponse {
        $banner->source()->delete();
        $banner->delete();
        $banner->clearMediaCollection($banner->collectionName);

        toastr()->success(__('app.banner.delete'));
        return to_route('banners.index');
    }
}
