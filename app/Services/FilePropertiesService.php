<?php declare(strict_types=1);

namespace App\Services;

use App\Models\File;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class FilePropertiesService {
    public function allFileData(Collection|array $eloquentCollection): array {
        return collect($eloquentCollection)
                ->map(fn ($file) => $this->getFileItemProperties($file))
                ->toArray();
    }

    public function allNewsAttachmentData(News $model): array {
        return collect($model->getMedia($model->collectionDocument))
                ->map(fn ($item) => [
                    'id'                => $item->id,
                    'mime_type'         => $item->mime_type,
                    'icon'              => $this->getFileIcon($item->mime_type),
                    'file_url'          => $item->getUrl(),
                    'file_name'         => $item->file_name,
                    'file_extension'    => pathinfo((string) $item->file_name, PATHINFO_EXTENSION),
                    'name'              => $item->name,
                    'size'              => $item->size,
                    'humanReadableSize' => formatBytes($item->size),
                ])
                ->toArray();
    }

    /**
     * @return array{id: mixed, slug: mixed, title: mixed, source_description: mixed, mime_type: mixed, icon: string, file_url: string|null, file_name: mixed, file_extension: string, name: mixed, size: mixed, humanReadableSize: string, sourceArr: array{source_source: mixed, source_source_url: mixed, source_author: mixed, source_author_url: mixed, source_license: mixed, source_license_url: mixed}}
     */
    public function getFileItemProperties(File $item): array {
        $fileMedia = $item->getFirstMedia($item->collectionName);
        return [
            'id'                => $item->id,
            'slug'              => $item->slug,
            'title'             => $item->title,
            'source_description'=> $item->source?->source_description,

            'mime_type'         => $fileMedia?->mime_type,
            'icon'              => $this->getFileIcon($fileMedia?->mime_type),

            'file_url'          => $fileMedia?->getUrl(),
            'file_name'         => $fileMedia?->file_name,
            'file_extension'    => pathinfo((string) $fileMedia?->file_name, PATHINFO_EXTENSION),
            'name'              => $fileMedia?->name,
            'size'              => $fileMedia?->size,
            'humanReadableSize' => formatBytes($fileMedia?->size),

            'sourceArr' => [
                'source_source'        => $item->source?->source_source,
                'source_source_url'    => $item->source?->source_source_url,
                'source_author'        => $item->source?->source_author,
                'source_author_url'    => $item->source?->source_author_url,
                'source_license'       => $item->source?->source_license,
                'source_license_url'   => $item->source?->source_license_url,
            ],
        ];
    }

    public function getFileIcon(?string $mimeType): string {
        if (is_null($mimeType)) {
            return 'file';
        }

        [$type, $subtype] = explode("/", $mimeType);

        return match ($type) {
            'image'       => 'file-image',
            'video'       => 'file-video',
            'audio'       => 'file-audio',
            'text'        => match ($subtype) {
                'plain' => 'file-alt',
                default => 'file-code'
            },
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
            if (str($subType)->contains($value)) {
                $icon = $key;
            }
        }

        return $icon;
    }
}
