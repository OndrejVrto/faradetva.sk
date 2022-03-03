<?php

namespace App\Services;

use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;

class MediaStoreService
{
    public function storeMediaOneFile(Model $model, string $colectionName, string $requestAttributte) {
        // Spatie media-collection
        $model->clearMediaCollection($colectionName);
        $model->addMediaFromRequest($requestAttributte)
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true))
                ->toMediaCollection($colectionName);
        return true;
    }
}
