<?php declare(strict_types=1);

namespace App\Services\ResponseCache;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\ResponseCache\Hasher\RequestHasher;
use Spatie\ResponseCache\CacheProfiles\CacheProfile;

class CustomHasher implements RequestHasher {
    public function __construct(
        protected CacheProfile $cacheProfile,
    ) {
    }

    public function getHashFor(Request $request): string {
        // return md5($request->getMethod()."__".$request->fullUrl());
        return $request->getMethod()."__". Str::slug(Str::replace(['/','?','='], '-', $request->fullUrl()));
    }
}
