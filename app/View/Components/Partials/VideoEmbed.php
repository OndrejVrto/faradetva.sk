<?php

declare(strict_types=1);

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Cohensive\OEmbed\Facades\OEmbed;

class VideoEmbed extends Component {
    public ?string $video = null;
    public ?array $dataVideo = null;

    public function __construct(
        string $urlVideo,
        array $config = [],
    ) {
        $embed = OEmbed::get($urlVideo);

        if ($embed) {
            $this->video = $embed->html($config);
            $this->dataVideo = $embed->data();
        }
    }

    public function render(): ?View {
        return is_null($this->video)
            ? null
            : view('components.partials.video-embed.index');
    }
}
