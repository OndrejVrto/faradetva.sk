<?php declare(strict_types=1);

namespace App\Enums;

enum PageType: int {
    case DEFAULT = 1;
    case CONTACT = 2;
    case ARTICLE = 3;
    case FAQ     = 4;
    case SEARCH  = 5;

    public function type(): string {
        return match ($this) {
            self::DEFAULT => 'WebPage',
            self::CONTACT => 'ContactPage',
            self::ARTICLE => 'NewsArticle',
            self::FAQ     => 'FAQPage',
            self::SEARCH  => 'SearchResultsPage',
        };
    }

    public function typeLocalize(): string {
        return match ($this) {
            self::DEFAULT => 'Obyčajná stránka',
            self::CONTACT => 'Stránka kontaktov',
            self::ARTICLE => 'Stránka s článkami',
            self::FAQ     => 'Otázky a odpovede',
            self::SEARCH  => 'Výsledky vyhľadávania',
        };
    }
}
