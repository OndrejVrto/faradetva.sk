<?php declare(strict_types=1);

namespace App\DataTransferObjects;

use Carbon\Carbon;

final class RepresentingImageData {
    public function __construct(
        public readonly string $url,
        public readonly string $urlThumb,
        public readonly string $fileName,
        public readonly string $mimeType,
        public readonly int $size,
        public readonly int $width,
        public readonly int $height,
        public readonly Carbon $updated_at,
        public SourceData $source,
    ) {
    }
}
