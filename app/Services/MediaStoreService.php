<?php

namespace App\Services;

use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class MediaStoreService
{
    public function handle(Model $model, FormRequest $request, string $requestAttributte, string $manualFileName = null): void {
        if ($request->hasFile($requestAttributte)) {
            $colectionName = $model->collectionName;

            $model->clearMediaCollection($colectionName);
            $model->addMediaFromRequest($requestAttributte)
                ->sanitizingFileName( function ($filename) use($manualFileName) {
                    return isset($manualFileName)
                        ? $manualFileName.'.'.pathinfo($filename, PATHINFO_EXTENSION)
                        : DataFormater::filterFilename($filename, true);
                })
                ->toMediaCollection($colectionName);
        }
    }
}
