<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Gajus\Dindent\Indenter;
use App\Services\MinifiHtml;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PreetyHtmlMiddleware {
    public function handle(Request $request, Closure $next): mixed {
        $response = $next($request);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            $intender = new Indenter(['indentation_character' => '  ']);
            // $intender->setElementType('circle', Indenter::ELEMENT_TYPE_INLINE);
            // $intender->setElementType('path', Indenter::ELEMENT_TYPE_INLINE);

            $output = in_array(config('app.env'), ['local', 'dev'])
                ? $intender->indent($response->getContent())
                : MinifiHtml::handle($response->getContent());

            $response->setContent($output);
        }

        return $response;
    }
}
