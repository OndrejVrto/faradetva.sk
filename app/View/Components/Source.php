<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Source extends Component
{
    public $source = null;
    public $source_url = null;
    public $author = null;
    public $author_url = null;
    public $license = null;
    public $license_url = null;

    public function __construct(
        public array $sourceArray = [],
        public string $sourceSmall = "false",
    ) {
        $this->source = $sourceArray['source'];
        $this->source_url = $sourceArray['source_url'];
        $this->author = $sourceArray['author'];
        $this->author_url = $sourceArray['author_url'];
        $this->license = $sourceArray['license'];
        $this->license_url = $sourceArray['license_url'];
    }

    public function render(): View {
        return view('components.source.index');
    }
}
