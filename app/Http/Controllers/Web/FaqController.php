<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\Faq;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\PurifiAutolinkService;

class FaqController extends Controller
{
    public function __invoke(): View  {
        $faqs = Faq::query()
            ->with('staticPages')
            ->get()
            ->map(function($faq) {
                $pages = [];
                foreach ($faq->staticPages as $page) {
                    $pages[] = [
                        'url'   => config('app.url').'/'.$page->url,
                        'title' => $page->title,
                    ];
                }
                return [
                    'id'           => $faq->id,
                    'question'     => $faq->question,
                    'answer-clean' => trim( preg_replace('!\s+!', ' ', preg_replace( "/\r|\n/", " ", $faq->answer ) ) ),
                    'answer'       => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    'pages'        => $pages,
                ];
            });

        // TODO:  add SEO META headers

        return view('web.faq.index', compact('faqs'));
    }
}
