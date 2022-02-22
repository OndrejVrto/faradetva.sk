<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Banner;

use App\Services\MediaStoreService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::latest('updated_at')->with('media')->paginate(5);

        return view('backend.banners.index', compact('banners'));
    }

    public function create() {
        return view('backend.banners.create');
    }

    public function store(BannerRequest $request, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $banner = Banner::create($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($banner, $banner->collectionName, 'photo');
        }

        toastr()->success(__('app.banner.store'));
        return redirect()->route('banners.index');
    }

    public function edit(Banner $banner) {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner, MediaStoreService $mediaService) {
        $validated = $request->validated();
        $banner->update($validated);

        if ($request->hasFile('photo')) {
            $mediaService->storeMediaOneFile($banner, $banner->collectionName, 'photo');
        }

        toastr()->success(__('app.banner.update'));
        return redirect()->route('banners.index');
    }

    public function destroy(Banner $banner) {
        $banner->delete();
        $banner->clearMediaCollection($banner->collectionName);

        toastr()->success(__('app.banner.delete'));
        return redirect()->route('banners.index');
    }
}
