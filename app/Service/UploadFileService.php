<?php

namespace App\Service;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFileService
{

	public final function uploadFiles( Model $model, $files ){

		if ( !$model ) return new \Exception("Missing model", 1);


		if ($files) foreach ($files as $file){

			if (!$file OR !$file->isValid() ) continue;

			try {

				$modelClassName = Str::slug(class_basename($model));
				$modelId = $model->id;

				$orginalFileName = $file->getClientOriginalName();
				$fileExtension = $file->getClientOriginalExtension();
				$fileNameBody = str_replace($fileExtension, '', $orginalFileName);

				$newFileName = time() . '_' . rand(10,99) . '_' . Str::slug($fileNameBody) . '.' . $fileExtension;
				$filePath = $modelClassName . '/' . $modelId . '/';
				$fileStorePath = 'public/' . $filePath;

				Storage::putFileAs( $fileStorePath, $file, $newFileName );

			} catch (\Exception $e) {
				return $e->getMessage();
			}

			$this->addFileToDatabase( $model, $file, $newFileName, $filePath);
		}

		return true;

	}

	private static function addFileToDatabase ($model, $file, $newFileName, $filePath) {

		return File::create([
			'fileable_id' => $model->id,
			'fileable_type' => get_class($model),
			'name' => $file->getClientOriginalName(),
			'filename' => $newFileName,
			'path' => $filePath,
			'mime' => $file->getClientMimeType(),
			'ext' => $file->getClientOriginalExtension(),
			'size_file' => $file->getSize()
		]);

	}

}
