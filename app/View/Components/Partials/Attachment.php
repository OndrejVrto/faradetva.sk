<?php

namespace App\View\Components\Partials;

use App\Models\File;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\FilePropertiesService;

class Attachment extends Component
{
    public $attachment;

    public function __construct(
        public string $nameSlug
    ) {
        $this->attachment = Cache::rememberForever('ATTACHMENT_'.$nameSlug, function () use($nameSlug) {
            $file = File::whereSlug($nameSlug)->with('media', 'source')->first();
            return (new FilePropertiesService())->getFileItemProperties($file);
        });
    }

    public function render(): View {
        return view('components.partials.attachment.index');
    }
}
