<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Banner;

use Illuminate\Contracts\View\View;
use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
    public function index(): View  {
        $banners = Banner::latest('updated_at')->with('media')->paginate(5);

        return view('backend.banners.index', compact('banners'));
    }

    public function create(): View  {
        return view('backend.banners.create');
    }

    public function store(BannerRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $banner = Banner::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($banner, $banner->collectionName, 'photo');
        }

        toastr()->success(__('app.banner.store'));
        return to_route('banners.index');
    }

    public function show(Banner $banner): View {
        $banner->load('media');

        return view('backend.banners.show', compact('banner'));
    }

    public function edit(Banner $banner): View  {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $banner->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($banner, $banner->collectionName, 'photo');
        }

        toastr()->success(__('app.banner.update'));
        return to_route('banners.index');
    }

    public function destroy(Banner $banner): RedirectResponse {
        $banner->delete();
        $banner->clearMediaCollection($banner->collectionName);

        toastr()->success(__('app.banner.delete'));
        return to_route('banners.index');
    }
}
