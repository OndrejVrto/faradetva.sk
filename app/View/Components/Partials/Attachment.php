<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use App\Models\File;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\FilePropertiesService;

class Attachment extends Component {
    public array $attachments;

    public function __construct(
        public string|array $nameSlugs
    ) {
        $listOfAttachments = prepareInput($nameSlugs);

        if ($listOfAttachments) {
            $cacheName = getCacheName($listOfAttachments);

            $this->attachments = Cache::rememberForever('ATTACHMENT_'.$cacheName, function () use ($listOfAttachments): array {
                return File::query()
                    ->whereIn('slug', $listOfAttachments)
                    ->with('media', 'source')
                    ->limit(0)
                    ->get()
                    ->map(function (File $file): array {
                        return (new FilePropertiesService())->getFileItemProperties($file);
                    })
                    ->toArray();
            });
        }
    }

    public function render(): ?View {
        if (empty($this->attachments)) {
            return null;
        }

        return view('components.partials.attachment.index');
    }
}
