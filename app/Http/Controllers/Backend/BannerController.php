<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;

use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::latest('updated_at')->with('media')->paginate(5);

        Session::remove('banner_old_input_checkbox');

        return view('backend.banners.index', compact('banners'));
    }

    public function create() {
        return view('backend.banners.create');
    }

    public function store(BannerRequest $request) {
        $validated = $request->validated();
        $banner = Banner::create($validated);

        if ($request->hasFile('photo')) {
            $banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
            $banner->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('banner');
        }

        toastr()->success(__('app.banner.store'));
        return redirect()->route('banners.index');
    }

    public function edit(Banner $banner) {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, $id) {
        $validated = $request->validated();

        $banner = Banner::findOrFail($id);
        $banner->update($validated);

        if ($request->hasFile('photo')) {
            $banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
            $banner->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                    ->toMediaCollection('banner');
        }

        toastr()->success(__('app.banner.update'));
        return redirect()->route('banners.index');
    }

    public function destroy(Banner $banner) {
        $banner->delete();
        $banner->clearMediaCollection('banner');

        toastr()->success(__('app.banner.delete'));
        return redirect()->route('banners.index');
    }
}
