<?php declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SourceSentence extends Component {
    public ?string $source = null;
    public ?string $source_url = null;
    public ?string $author = null;
    public ?string $author_url = null;
    public ?string $license = null;
    public ?string $license_url = null;

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
