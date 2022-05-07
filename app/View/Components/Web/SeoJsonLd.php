<?php

namespace App\View\Components\Web;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SeoJsonLd extends Component
{
    public $jsonLd;

    public function __construct()
    {
        $generated = SeoGraph::toArray();
        array_push($generated['@graph'], SeoSchema::convertToArray());
        $this->jsonLd = json_encode($generated, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    }

    public function render(): View|null {
        return view('components.web.seo-json-ld');
    }
}
