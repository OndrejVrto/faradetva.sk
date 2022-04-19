<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

    public function index(Request $request): View {
        $notices = $this->model::query()
            ->with('media')
            ->latest()
            ->archive($request, $this->resource)
            ->paginate(10)
            ->withQueryString();

        return view('backend.notices.index', compact('notices'))->with('controller', $this->resource);
    }

    public function create(): View {
        return view('backend.notices.create')->with('controller', $this->resource);
    }

    public function store(NoticeRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        try {
            $notice = $this->instance::create(Notice::sanitize($validated));
        } catch (\Throwable $th) {
            info($th);
        }
        $mediaService->handle($notice, $request, 'notice_file', $validated['slug'] );

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
            $model->update(Notice::sanitize($validated));
        } catch (\Throwable $th) {
            info($th);
        }
        $mediaService->handle($model, $request, 'notice_file', $validated['slug'] );

        toastr()->success(__('app.'.$this->resource.'.update'));
        return to_route($this->resource.'.index');
    }

    public function destroy(Model $model): RedirectResponse {
        $model->delete();

        toastr()->success(__('app.'.$this->resource.'.delete'));
        return to_route($this->resource.'.index');
    }

    public function restore($id): RedirectResponse {
        $model = $this->instance::onlyTrashed()->findOrFail($id);
        $model->slug = Str::slug($model->title).'-'.Str::random(5);
        $model->title = '*'. $model->title;
        $model->restore();

        toastr()->success(__('app.'.$this->resource.'.restore'));
        return to_route($this->resource.'.edit',  $model->slug);
    }

    public function force_delete($id): RedirectResponse {
        $model = $this->instance::onlyTrashed()->findOrFail($id);
        $model->clearMediaCollection($model->collectionName);
        $model->forceDelete();

        toastr()->success(__('app.'.$this->resource.'.force-delete'));
        return to_route($this->resource.'.index');
    }
}
