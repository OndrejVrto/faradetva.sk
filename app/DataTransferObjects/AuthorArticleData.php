<?php declare(strict_types=1);

namespace App\DataTransferObjects;

final class AuthorArticleData {
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $slug,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $wwwPageUrl,
        public readonly ?string $twitterUrl,
        public readonly ?string $facebookUrl,
    ) {
    }
}
