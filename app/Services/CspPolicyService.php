<?php

namespace App\Services;

use Spatie\Csp\Scheme;
use Spatie\Csp\Keyword;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CspPolicyService extends Basic
{
    public function configure()
    {
        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF)
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, [
                Keyword::SELF,
                Scheme::DATA,  // this line is for saptie media library responsive pistures
            ])
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::OBJECT, [
                Keyword::NONE,
            ])
            ->addDirective(Directive::SCRIPT, [
                Keyword::SELF,
                Keyword::UNSAFE_HASHES, // this line is for saptie media library responsive pistures
                'sha256-x1e8vcgVIbQJccF2wQ79XGq1vniIt0sZSGt/eFcfzag=',  // this line is for saptie media library responsive pistures
                'cdnjs.cloudflare.com',
                'cdn.jsdelivr.net',
            ])
            ->addDirective(Directive::STYLE, [
                Keyword::SELF,
                'fonts.googleapis.com',
                'cdn.jsdelivr.net',
            ])
            ->addDirective(Directive::DEFAULT, [
                Keyword::SELF,
                'fonts.gstatic.com',
                'cdn.jsdelivr.net',
            ])
            ->addNonceForDirective(Directive::SCRIPT)
            ->addNonceForDirective(Directive::IMG)
            ->addNonceForDirective(Directive::STYLE);
    }
}
