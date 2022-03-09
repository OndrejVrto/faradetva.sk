<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Http\Contracts\CrudInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

class NoticeController extends Controller implements CrudInterface
{
    /**
     * Name of the resource, in lowercase plural form.
     */
    protected $resource;

    /**
     * Name of the model class.
     */
    protected $model;

    /**
     * Model instance.
     */
    private $instance;

    /**
     * Set an instance of the model.
     * @fixme Also this looks weird to me.
     */
    function __construct()
    {
        $this->instance = new $this->model;
    }

    public function index(): View {
        $notices = $this->model::with('media')->latest()->paginate(10);

        return view('backend.notices.index', compact('notices'))->with('controller', $this->resource);
    }

    public function create(): View {
        return view('backend.notices.create')->with('controller', $this->resource);
    }

    public function store(NoticeRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        try {
            $notice = $this->instance::create($validated);
        } catch (\Throwable $th) {
            dd($th->getCode());
        }

        if ($request->hasFile('notice_file')) {
            $mediaService->storeMediaOneFile($notice, $notice->collectionName, 'notice_file');
        }

        toastr()->success(__('app.'.$this->resource.'.store'));
        return to_route($this->resource.'.index');
    }

    public function edit(Model $model): View {
        $model->load('media');

        return view('backend.notices.edit')->with('notice', $model)->with('controller', $this->resource);
    }

    public function update(NoticeRequest $request, Model $model, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        try {
            $model->update($validated);
        } catch (\Throwable $th) {
            dd($th);
        }
        if ($request->hasFile('notice_file')) {
            $mediaService->storeMediaOneFile($model, $model->collectionName, 'notice_file');
        }

        toastr()->success(__('app.'.$this->resource.'.update'));
        return to_route($this->resource.'.index');
    }

    public function destroy(Model $model): RedirectResponse {
        $model->delete();
        $model->clearMediaCollection($model->collectionName);

        toastr()->success(__('app.'.$this->resource.'.delete'));
        return to_route($this->resource.'.index');
    }
}
