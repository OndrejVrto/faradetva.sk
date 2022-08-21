<?php declare(strict_types=1);

namespace App\DataTransferObjects;

final class SourceData {
    public function __construct(
        public readonly string  $description,
        public readonly ?string $source,
        public readonly ?string $sourceUrl,
        public readonly ?string $author,
        public readonly ?string $authorUrl,
        public readonly ?string $license,
        public readonly ?string $licenseUrl,
    ) {
    }
}
