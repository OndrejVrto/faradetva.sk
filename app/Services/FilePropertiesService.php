<?php

namespace App\Services;

use App\Models\File;
use App\Http\Helpers\DataFormater;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class FilePropertiesService
{
    public function allFileData(Collection|array $eloquentCollection): Array {
        return collect($eloquentCollection)->map(function($file) {
            return $this->getFileItemProperties($file);
        })->toArray();
    }

    public function allNewsAttachmentData(News $model): Array {
        return $model->getMedia($model->collectionDocument)->map(function($item) {
            return [
                'id'                => $item->id,
                'mime_type'         => $item->mime_type,
                'icon'              => $this->getFileIcon($item->mime_type),
                'file_url'          => $item->getUrl(),
                'file_name'         => $item->file_name,
                'file_extension'    => pathinfo($item->file_name, PATHINFO_EXTENSION),
                'name'              => $item->name,
                'size'              => $item->size,
                'humanReadableSize' => formatBytes($item->size),
            ];
        })->toArray();
    }

    public function getFileItemProperties(File $item): Array {
        $fileMedia = $item->getFirstMedia($item->collectionName);
        return [
            'id'                => $item->id,
            'slug'              => $item->slug,
            'title'             => $item->title,
            'source_description'=> $item->source->source_description,

            'mime_type'         => $fileMedia->mime_type,
            'icon'              => $this->getFileIcon($fileMedia->mime_type),

            'file_url'          => $fileMedia->getUrl(),
            'file_name'         => $fileMedia->file_name,
            'file_extension'    => pathinfo($fileMedia->file_name, PATHINFO_EXTENSION),
            'name'              => $fileMedia->name,
            'size'              => $fileMedia->size,
            'humanReadableSize' => formatBytes($fileMedia->size),

            'sourceArr' => [
                'source_source'        => $item->source->source_source,
                'source_source_url'    => $item->source->source_source_url,
                'source_author'        => $item->source->source_author,
                'source_author_url'    => $item->source->source_author_url,
                'source_license'       => $item->source->source_license,
                'source_license_url'   => $item->source->source_license_url,
            ],
        ];
    }

    public function getFileIcon(string $mimeType): string {
        list($type, $subtype) = explode("/", $mimeType);

        return match ($type) {
            'image'       => 'file-image',
            'video'       => 'file-video',
            'audio'       => 'file-audio',
            'text'        => call_user_func(fn() => match($subtype) {
                                'plain' => 'file-alt',
                                default => 'file-code'
                            }),
            'application' => $this->matchApplication($subtype),
            default       => 'file'
        };
    }

    private function matchApplication(string $subType): string {
        $icon = 'file';
        $SUBTYPES = [
            'file-word' => ['word', 'document'],
            'file-pdf' => ['pdf'],
            'file-code' => ['empty'],
            'file-excel' => ['excel', 'sheet'],
            'file-powerpoint' => ['powerpoint', 'presentation'],
            'file-archive' => ['rar', 'zip'],
        ];

        foreach ($SUBTYPES as $key => $value) {
            if(str($subType)->contains($value)) $icon = $key;
        }

        return $icon;
    }
}
