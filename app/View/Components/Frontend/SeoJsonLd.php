<?php

namespace App\View\Components\Frontend;

use App\Facades\SeoGraph;
use App\Facades\SeoSchema;
use App\Overides\CustomJsonLd;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Artesaos\SEOTools\Facades\JsonLd;

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
        return view('components.frontend.seo-json-ld');
    }
}
