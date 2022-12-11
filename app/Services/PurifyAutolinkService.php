<?php declare(strict_types=1);

namespace App\Services;

use Stevebauman\Purify\Facades\Purify;
use OsiemSiedem\Autolink\Facades\Autolink;
use OsiemSiedem\Autolink\Elements\UrlElement;

class PurifyAutolinkService {
    public function getCleanTextWithLinks(?string $text, string $class = 'link-template'): string {
        if($text === '' || $text === '0' || is_null($text)) {
            return '';
        }

        $purifiedText = Purify::clean(
            Autolink::convert(
                $text,
                fn ($element): UrlElement => new UrlElement(
                    title      : $element->getTitle(),
                    url        : $element->getUrl(),
                    start      : $element->getStart(),
                    end        : $element->getEnd(),
                    attributes : ['class' => $class],
                )
            )->toHtml()
        );

        return is_array($purifiedText)
            ? (string) $purifiedText[0]
            : (string) $purifiedText;
    }
}
