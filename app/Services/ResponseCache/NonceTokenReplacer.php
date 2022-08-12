<?php declare(strict_types=1);

namespace App\Services\ResponseCache;

use Spatie\ResponseCache\Replacers\Replacer;
use Symfony\Component\HttpFoundation\Response;

class NonceTokenReplacer implements Replacer {
    protected string $replacementString = '<laravel-responsecache-nonce-token-here>';
    protected string $replacementStringStyle = '<style laravel-responsecache-nonce-token-here>';
    protected string $replacementStringScript = '<script laravel-responsecache-nonce-token-here>';

    public function prepareResponseToCache(Response $response): void {
        if (! $response->getContent()) {
            return;
        }

        $response->setContent(str_replace(
            [
                csp_nonce(),
                '<style>',
                '<script>'
            ],
            [
                $this->replacementString,
                $this->replacementStringStyle,
                $this->replacementStringScript
            ],
            $response->getContent()
        ));
    }

    public function replaceInCachedResponse(Response $response): void {
        if (! $response->getContent()) {
            return;
        }

        $response->setContent(str_replace(
            [
                $this->replacementString,
                $this->replacementStringStyle,
                $this->replacementStringScript
            ],
            [
                csp_nonce(),
                '<style nonce="'.csp_nonce().'">',
                '<script nonce="'.csp_nonce().'">'
            ],
            $response->getContent()
        ));
    }
}
