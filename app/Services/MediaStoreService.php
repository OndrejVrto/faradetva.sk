<?php

namespace App\Services;

use App\Http\Helpers\DataFormater;

class MediaStoreService
{
    public function storeMediaPriest($priest){
        // Spatie media-collection
        $priest->clearMediaCollectionExcept('priest', $priest->getFirstMedia());
        $priest->addMediaFromRequest('photo')
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true) )
                ->toMediaCollection('priest');
    }

}
