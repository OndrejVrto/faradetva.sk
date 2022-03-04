<?php

namespace App\Services\Csp;

use Spatie\Csp\Keyword;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MyCustomCspPolicy extends Basic
{
    public function configure()
    {
        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF)
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, [
                Keyword::SELF,
            ])
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::SCRIPT, [
                Keyword::SELF,
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
            ->addNonceForDirective(Directive::STYLE);
    }
}
