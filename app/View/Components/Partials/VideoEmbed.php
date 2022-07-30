<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Cohensive\OEmbed\Facades\OEmbed;

class VideoEmbed extends Component {
    public $video = null;
    public $dataVideo = null;

    public function __construct(
        private string $urlVideo,
        private array $config = [],
    ) {
        $embed = OEmbed::get($urlVideo);

        if ($embed) {
            $this->video = $embed->html($config);
            $this->dataVideo = $embed->data();
        }
    }

    public function render(): View {
        if (!is_null($this->video)) {
            return view('components.partials.video-embed.index');
        }
        return null;
    }
}
