<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;

use App\Http\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{


    public function index()
    {
        Session::remove('banner_old_input_checkbox');

        $banners = Banner::latest('updated_at')->with('media')->paginate(5);
        return view('backend.banners.index', compact('banners'));
    }



    public function create()
    {
        return view('backend.banners.create');
    }



    public function store(BannerRequest $request)
    {
        $validated = $request->validated();
        $banner = Banner::create($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
            $banner->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('banner');
        }


        $notification = array(
            'message' => 'Nový baner bol pridaný!',
            'alert-type' => 'success'
        );
        return redirect()->route('banners.index')->with($notification);
    }



    public function edit($id)
    {
        $banner = Banner::whereId($id)->firstOrFail();

        return view('backend.banners.edit', compact('banner'));
    }



    public function update(BannerRequest $request, $id)
    {
        $validated = $request->validated();

        $banner = Banner::findOrFail($id);
        $banner->update($validated);

        // Spatie media-collection
        if ($request->hasFile('photo')) {
            $banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
            $banner->addMediaFromRequest('photo')
                    ->sanitizingFileName( fn($fileName) => DataFormater::filter_filename($fileName, true) )
                    ->toMediaCollection('banner');
        }

        $notification = array(
            'message' => 'Baner bol upravený.',
            'alert-type' => 'success'
        );
        return redirect()->route('banners.index')->with($notification);
    }



    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        $banner->clearMediaCollection('banner');

        $notification = array(
            'message' => 'Baner bol odstránený!',
            'alert-type' => 'success'
        );
        return redirect()->route('banners.index')->with($notification);
    }


}
