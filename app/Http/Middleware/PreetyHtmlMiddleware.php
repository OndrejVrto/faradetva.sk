<?php

namespace App\Http\Middleware;

use Closure;
use BeautifyHtml;
use Illuminate\Http\Request;

class PreetyHtmlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $response = $next($request);

        // if (in_array(env('APP_ENV'), ['local', 'dev'])) {
            $code = $response->getStatusCode();

            if ($code === 200) {
                $content = $response->getContent();

                $beautify = new BeautifyHtml(array(
                    'indent_inner_html' => false,
                    'indent_char' => "    ",
                    'indent_size' => 1,
                    'wrap_line_length' => 32786,
                    'unformatted' => ['code', 'pre'],
                    'preserve_newlines' => false,
                    'max_preserve_newlines' => 32786,
                    'indent_scripts'    => 'normal' // keep|separate|normal
                ));

                $output = $beautify->beautify($content);

                $response->setContent($output);
            }
        // }

        return $response;
    }
}
