<?php

declare(strict_types=1);

namespace App\View\Components\Web;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SeoJsonLd extends Component {
    public ?string $jsonLd = null;

    public function __construct() {
        $generated = SeoGraph::toArray();
        array_push($generated['@graph'], SeoSchema::convertToArray());
        try {
            $this->jsonLd = json_encode($generated, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
        }
    }

    public function render(): ?View {
        return $this->jsonLd
            ? null
            : view('components.web.seo-json-ld');
    }
}
