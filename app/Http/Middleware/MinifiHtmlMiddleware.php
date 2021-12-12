<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MinifiHtmlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
		$content = $response->getContent();

		$minifi = $this->minifi( $content );

		$response->setContent($minifi);

		return $response;

    }

	private function minifi($htmlString)
	{
		$search = array(
			'/\>[^\S ]+/s',     // strip whitespaces after tags, except space
			'/[^\S ]+\</s',     // strip whitespaces before tags, except space
			'/(\s)+/s',         // shorten multiple whitespace sequences
			'/<!--(.|\s)*?-->/' // Remove HTML comments
		);

		$replace = array(
			'>',
			'<',
			'\\1',
			''
		);

		return preg_replace($search, $replace, $htmlString);

	}

}
