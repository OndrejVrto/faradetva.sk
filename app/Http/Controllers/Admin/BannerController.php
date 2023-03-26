<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\Source;
use App\Models\StaticPage;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller {
    public function index(): View {
        $banners = Banner::query()
            ->latest('updated_at')
            ->withCount('staticPages')
            ->with('media', 'source', 'staticPages')
            ->paginate(8);

        return view('admin.banners.index', compact('banners'));
    }

    public function create(): View {
        $pages = StaticPage::query()
            ->select(['id','title','description_page'])
            // ->activated()
            ->orderBy('title')
            ->get();
        $selectedPages = [];

        return view('admin.banners.create', compact('pages', 'selectedPages'));
    }

    public function store(BannerRequest $request): RedirectResponse {
        $validated = $request->validated();

        $banner = Banner::create(Banner::sanitize($validated));
        $banner->staticPages()->syncWithoutDetaching($request->input('page'));
        $banner->source()->create(Source::sanitize($validated));

        (new MediaStoreService())->handleCropPicture($banner, $request);

        toastr()->success(__('app.banner.store'));
        return to_route('banners.index');
    }

    public function show(Banner $banner): View {
        $banner->load('media', 'source', 'staticPages');

        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner): View {
        $banner->load('source');
        $pages = StaticPage::query()
            ->select(['id','title','description_page'])
            // ->activated()
            ->orderBy('title')
            ->get();
        $selectedPages = $banner->staticPages->pluck('id')->unique()->toArray();

        return view('admin.banners.edit', compact('banner', 'pages', 'selectedPages'));
    }

    public function update(BannerRequest $request, Banner $banner): RedirectResponse {
        $validated = $request->validated();

        $banner->update(Banner::sanitize($validated));
        $banner->source()->update(Source::sanitize($validated));
        $banner->staticPages()->sync($request->input('page'));
        $banner->touch(); // Touch because i need start observer for delete cache

        (new MediaStoreService())->handleCropPicture($banner, $request);

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
