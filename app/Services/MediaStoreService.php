<?php

namespace App\Services;

use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;

class MediaStoreService
{
    public function storeMediaOneFile(Model $model, string $colectionName, string $requestAttributte) {
        // Spatie media-collection

        // TODO Aktualizácia description bez vkladania obrazku
        // TODO Sanitizing filename with Str::slug ??
        // TODO Doplnenie Copywright a autora do description

        $model->clearMediaCollectionExcept($colectionName, $model->getFirstMedia());
        $model->addMediaFromRequest($requestAttributte)
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true))
                ->toMediaCollection($colectionName);
        return true;
    }

    public function storeMediaFiles(Model $model, string $colectionName, array $filesArray, $filesDescription ) {
        // Spatie media-collection

        // TODO Vymazanie
        // TODO Aktualizácia description bez vkladania obrazku
        // TODO Sanitizing filename with Str::slug ??
        // TODO Doplnenie Copywright a autora do description

        $counter = 0;
        foreach ($filesArray as $file) {
            $model->addMedia($file)
                    // ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName))
                    ->withCustomProperties(['filesDescription' => $filesDescription[$counter]])
                    ->toMediaCollection($colectionName);
            $counter++;
        }
        return true;
    }
}
