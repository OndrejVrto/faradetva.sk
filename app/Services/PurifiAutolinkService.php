<?php declare(strict_types=1);

namespace App\Services;

use Stevebauman\Purify\Facades\Purify;
use OsiemSiedem\Autolink\Facades\Autolink;
use OsiemSiedem\Autolink\Elements\UrlElement;

class PurifiAutolinkService {
    public function getCleanTextWithLinks(?string $text, string $class = 'link-template'): string {
        if($text === '' || $text === '0' || is_null($text)) {
            return '';
        }

        return (string) Purify::clean(
            (string) Autolink::convert(
                $text,
                fn ($element): UrlElement => new UrlElement(
                    title      : $element->getTitle(),
                    url        : $element->getUrl(),
                    start      : $element->getStart(),
                    end        : $element->getEnd(),
                    attributes : ['class' => $class],
                )
            )
        );
    }
}
