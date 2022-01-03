<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		Session::remove('banner_old_input_checkbox');

		$banners = Banner::latest('updated_at')->with('media')->paginate(5);
		return view('banners.index', compact('banners'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
		$validated = $request->validated();
		$banner = Banner::create($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
			$banner->addMediaFromRequest('photo')->toMediaCollection('banner');
		}


		$notification = array(
			'message' => 'Nový baner bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('banners.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$banner = Banner::whereId($id)->firstOrFail();

		return view('banners.edit', compact('banner'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBannerRequest $request, $id)
    {
		$validated = $request->validated();

		$banner = Banner::findOrFail($id);
		$banner->update($validated);

		// Spatie media-collection
		if ($request->hasFile('photo')) {
			$banner->clearMediaCollectionExcept('banner', $banner->getFirstMedia());
			$banner->addMediaFromRequest('photo')->toMediaCollection('banner');
		}

		$notification = array(
			'message' => 'Baner bol upravený.',
			'alert-type' => 'success'
		);
        return redirect()->route('banners.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
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
