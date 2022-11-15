<?php declare(strict_types=1);

namespace App\DataTransferObjects;

use Carbon\Carbon;
use App\Enums\PageType;

final class PageData {
    public function __construct(
        public readonly int $id,
        public readonly bool $isActive,
        public readonly bool $isVirtual,
        public readonly string $title,
        public readonly string $slug,
        public readonly string $url,
        public readonly string $description,
        public readonly string $keywords,
        public readonly string $header,
        public readonly string $teaser,
        public readonly string $route,
        public readonly PageType $type,
        public readonly ?string $author,
        public readonly ?string $wikipedia,
        public readonly Carbon $datePublished,
        public readonly Carbon $dateModified,
        public readonly array $banners,
        public readonly array $faqs,
        public readonly RepresentingImageData $image,
        public readonly ?string $breadCrumb,
    ) {
    }
}
