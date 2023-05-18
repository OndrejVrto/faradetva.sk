<?php declare(strict_types=1);

namespace App\DataTransferObjects;

use Carbon\Carbon;
use App\Enums\PageType;

final class PageArticleData {
    public function __construct(
        public readonly int      $id,
        public readonly string   $url,
        public readonly PageType $type,
        public readonly string   $slug,
        public readonly string   $title,
        public readonly string   $teaser,
        public readonly string   $keywords,
        public readonly string   $category,
        public readonly int      $countWords,
        public readonly string   $description,
        public readonly string   $contentPlain,
        public readonly ?string  $tags,
        public readonly ?Carbon  $dateExpires,
        public readonly Carbon   $dateModified,
        public readonly Carbon   $datePublished,
        public readonly AuthorArticleData $author,
        public readonly RepresentingImageData $image,
        public readonly ?string  $wikipedia = null,
    ) {
    }
}
