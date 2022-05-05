<?php

namespace App\Services\ResponseCache;

use Spatie\ResponseCache\Replacers\Replacer;
use Symfony\Component\HttpFoundation\Response;

class NonceTokenReplacer implements Replacer
{
    protected string $replacementString = '<laravel-responsecache-nonce-token-here>';

    public function prepareResponseToCache(Response $response): void
    {
        if (! $response->getContent()) {
            return;
        }

        $response->setContent(str_replace(
            csp_nonce(),
            $this->replacementString,
            $response->getContent()
        ));
    }

    public function replaceInCachedResponse(Response $response): void
    {
        if (! $response->getContent()) {
            return;
        }

        $response->setContent(str_replace(
            $this->replacementString,
            csp_nonce(),
            $response->getContent()
        ));
    }
}
