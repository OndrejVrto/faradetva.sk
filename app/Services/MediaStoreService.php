<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;
use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class MediaStoreService {
    public function handle(Model $model, FormRequest $request, string $requestAttributte, string $manualFileName = null): void {
        if ($request->hasFile($requestAttributte)) {
            $colectionName = $model->collectionName;

            $model->clearMediaCollection($colectionName);
            $model->addMediaFromRequest($requestAttributte)
                ->sanitizingFileName(fn ($filename) => (isset($manualFileName) && !empty(trim($manualFileName)))
                    ? $manualFileName.'.'.pathinfo((string) $filename, PATHINFO_EXTENSION)
                    : DataFormater::filterFilename($filename, true))
                ->toMediaCollection($colectionName);
        }
    }

    public function handleCropPicture(Model $model, FormRequest $request, string $name = null): void {
        if (!empty($request->crop_output_base64) && !empty($request->crop_output_file_name)) {
            $colectionName = $model->collectionName;
            $fileExtension = explode("image/", explode(";base64,", (string) $request->crop_output_base64)[0])[1];

            if (isset($name)) {
                $fileName = Str::slug($name).'.'.$fileExtension;
            } elseif (property_exists($request, 'source_description') && $request->source_description !== null) {
                $fileName = Str::slug($request->source_description).'.'.$fileExtension;
            } else {
                $fileName = DataFormater::filterFilename($request->crop_output_file_name, true);
            }

            $model->clearMediaCollection($colectionName);
            $model->addMediaFromBase64($request->crop_output_base64)
                ->usingFileName($fileName)
                ->withCustomProperties([
                    'oldFileName'     => $request->crop_output_file_name,
                    'width'           => $request->crop_output_width,
                    'height'          => $request->crop_output_height,
                    'exactDimansions' => $request->crop_output_exact_dimensions,
                ])
                ->toMediaCollection($colectionName);
        }
    }
}
