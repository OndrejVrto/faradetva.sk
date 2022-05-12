<?php

namespace App\Http\Middleware;

use Closure;
use BeautifyHtml;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        if ($response->getStatusCode() === Response::HTTP_OK) {

            if (in_array(config('app.env'), ['local', 'dev'])) {
                $beautify = new BeautifyHtml([
                    'indent_inner_html' => false,
                    'indent_char' => "    ",
                    'indent_size' => 1,
                    'wrap_line_length' => 32786,
                    'unformatted' => ['code', 'pre'],
                    'preserve_newlines' => false,
                    'max_preserve_newlines' => 32786,
                    'indent_scripts'    => 'normal' // keep|separate|normal
                ]);
                $output = $beautify->beautify( $response->getContent() );
            } else {
                $output = minifyHtml( $response->getContent() );
            }

            // $output = Str::replace((string)config('app.url').'/', "/", $output);
            // $output = Str::replace('<link rel="canonical" href="/', '<link rel="canonical" href="'.(string)config('app.url').'/', $output);
            // $output = Str::replace('<base href="">', '<base href="'.(string)config('app.url').'">', $output);
            // $output = Str::replace('": "/', '": "'.(string)config('app.url').'/', $output);

            $response->setContent($output);
        }

        return $response;
    }
}
