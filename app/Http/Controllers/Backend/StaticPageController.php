<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StaticPageRequest;

class StaticPageController extends Controller
{
    public function index(Request $request): View {
        $pages = StaticPage::query()
            ->orderBy('slug')
            ->withCount('banners')
            ->withCount('faqs')
            ->archive($request, 'pages')
            ->get();

        return view('backend.static-pages.index', compact('pages'));
    }

    public function create(): View  {
        $banners = Banner::with('media', 'source')->get();
        $selectedBanners = [];

        return view('backend.static-pages.create', compact('banners', 'selectedBanners'));
    }

    public function store(StaticPageRequest $request): RedirectResponse {
        $validated = $request->validated();
        $staticPage = StaticPage::create($validated);

        $banners = $request->input('banner');
        $staticPage->banners()->syncWithoutDetaching($banners);

        toastr()->success(__('app.static-page.store'));
        return to_route('static-pages.index');
    }

    public function edit(StaticPage $staticPage): View {
        $staticPage->load('banners');
        $banners = Banner::with('media', 'source')->get();
        $selectedBanners = $staticPage->banners->pluck('id')->unique()->toArray();

        return view('backend.static-pages.edit', compact('staticPage', 'banners', 'selectedBanners'));
    }

    public function update(StaticPageRequest $request, StaticPage $staticPage): RedirectResponse {
        $validated = $request->validated();
        $staticPage->update($validated);

        $banners = $request->input('banner');
        $staticPage->banners()->sync($banners);

        toastr()->success(__('app.static-page.update'));
        return to_route('static-pages.index');
    }

    public function destroy(StaticPage $staticPage): RedirectResponse {
        $staticPage->delete();

        toastr()->success(__('app.static-page.delete'));
        return to_route('static-pages.index');
    }

    public function restore($id): RedirectResponse {
        $staticPage = StaticPage::onlyTrashed()->findOrFail($id);
        $staticPage->slug = Str::slug( Str::replace('/', '-', $staticPage->url) ).'-'.Str::random(5);
        $staticPage->title = '*'.$staticPage->title;
        $staticPage->restore();

        toastr()->success(__('app.static-page.restore'));
        return to_route('static-pages.edit', $staticPage->slug);
    }

    public function force_delete($id): RedirectResponse {
        $staticPage = StaticPage::onlyTrashed()->findOrFail($id);
        $staticPage->banners()->detach($id);
        $staticPage->forceDelete();

        toastr()->success(__('app.static-page.force-delete'));
        return to_route('static-pages.index');
    }
}
