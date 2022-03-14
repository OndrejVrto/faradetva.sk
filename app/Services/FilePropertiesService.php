<?php

namespace App\Services;

use App\Models\File;
use App\Http\Helpers\DataFormater;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class FilePropertiesService
{
    public function allFileData(Collection|array $eloquentCollection): Array {
        return collect($eloquentCollection)->map(function($file) {
            return $this->getItemProperties($file);
        })->toArray();
    }

    public function getItemProperties(File $item): Array {
        $fileMedia = $item->getFirstMedia('attachment');
        return [
            'id'                => $item->id,
            'slug'              => $item->slug,
            'title'             => $item->title,
            'description'       => $item->source->description,

            'mime_type'         => $fileMedia->mime_type,
            'icon'              => $this->getFileIcon($fileMedia->mime_type),

            'file_url'         => $fileMedia->getUrl(),
            'file_name'         => $fileMedia->file_name,
            'file_extension'    => pathinfo($fileMedia->file_name, PATHINFO_EXTENSION),
            'name'              => $fileMedia->name,
            'size'              => $fileMedia->size,
            'humanReadableSize' => DataFormater::formatBytes($fileMedia->size),

            'sourceArr' => [
                'source'        => $item->source->source,
                'source_url'    => $item->source->source_url,
                'author'        => $item->source->author,
                'author_url'    => $item->source->author_url,
                'license'       => $item->source->license,
                'license_url'   => $item->source->license_url,
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
