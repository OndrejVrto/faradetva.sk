<?php

declare(strict_types=1);

namespace App\Services;

use Spatie\Csp\Scheme;
use Spatie\Csp\Keyword;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CspPolicyService extends Basic {
    public function configure() {
        $this
            ->addDirective(Directive::DEFAULT, [
                Keyword::SELF,
                'fonts.gstatic.com',
                '*.facebook.com',
                '*.fbcdn.net',
                'cdn.jsdelivr.net',
                'cdnjs.cloudflare.com',
            ])
            ->addDirective(Directive::BASE, [
                Keyword::SELF,
            ])
            ->addDirective(Directive::CONNECT, [
                Keyword::SELF,
                'maps.googleapis.com',
            ])
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, [
                Keyword::SELF,
                Scheme::DATA,  // this line is for saptie media library responsive pistures
                'maps.gstatic.com',
                '*.googleapis.com',
            ])
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::OBJECT, [
                Keyword::NONE,
            ])
            ->addDirective(Directive::SCRIPT, [
                Keyword::SELF,
                Keyword::UNSAFE_HASHES, // this line is for saptie media library responsive pistures
                'sha256-x1e8vcgVIbQJccF2wQ79XGq1vniIt0sZSGt/eFcfzag=',  // this line is for saptie media library responsive pistures
                'sha256-9K+fEDqIyD+XahBDIsS1HJfWaTCI321eBrwKwbRaQ1g=',
                'maps.googleapis.com',
                'connect.facebook.net',
                'cdnjs.cloudflare.com',
                'cdn.jsdelivr.net',
            ])
            ->addDirective(Directive::STYLE, [
                Keyword::SELF,
                Keyword::UNSAFE_INLINE,
                'fonts.googleapis.com',
                'maps.googleapis.com',
                'cdnjs.cloudflare.com',
            ])
            ->addNonceForDirective(Directive::SCRIPT)
            ->addNonceForDirective(Directive::IMG);
        // ->addNonceForDirective(Directive::STYLE);
    }
}
