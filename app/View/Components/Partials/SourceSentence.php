<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SourceSentence extends Component
{
    public $source = null;
    public $source_url = null;
    public $author = null;
    public $author_url = null;
    public $license = null;
    public $license_url = null;

    public function __construct(
        public array $sourceArray = [],
        public string $dimensionSource = 'full',
    ) {
        $this->source = $sourceArray['source_source'];
        $this->source_url = $sourceArray['source_source_url'];
        $this->author = $sourceArray['source_author'];
        $this->author_url = $sourceArray['source_author_url'];
        $this->license = $sourceArray['source_license'];
        $this->license_url = $sourceArray['source_license_url'];
    }

    public function render(): View {
        return view('components.partials.source-sentence.index');
    }
}
