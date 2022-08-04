<?php

declare(strict_types=1);

namespace App\Services;

use Stevebauman\Purify\Facades\Purify;
use OsiemSiedem\Autolink\Facades\Autolink;
use OsiemSiedem\Autolink\Elements\UrlElement;

class PurifiAutolinkService {
    public function getCleanTextWithLinks(?string $text, string $class = 'link-template'): ?string {
        return !$text
            ? null
            : Purify::clean(
                strval(Autolink::convert(
                    $text,
                    function ($element) use ($class) {
                        return new UrlElement(
                            title: $element->getTitle(),
                            url: $element->getUrl(),
                            start: $element->getStart(),
                            end: $element->getEnd(),
                            attributes: ['class' => $class],
                        );
                    }
                ))
            );
    }
}
