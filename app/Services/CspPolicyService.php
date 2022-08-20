<?php declare(strict_types=1);

namespace App\Services;

use Spatie\Csp\Scheme;
use Spatie\Csp\Keyword;
use Spatie\Csp\Directive;
use Illuminate\Http\Request;
use Spatie\Csp\Policies\Basic;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class CspPolicyService extends Basic {
    public function configure(): void {
        $this
            ->addNonceForDirective(Directive::SCRIPT)
            ->addNonceForDirective(Directive::IMG)
            ->addNonceForDirective(Directive::STYLE)
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
            ->addDirective(Directive::FORM_ACTION, [
                Keyword::SELF
            ])
            ->addDirective(Directive::IMG, [
                Keyword::SELF,
                Scheme::DATA,  // this line is for saptie media library responsive pistures inline script
                'maps.gstatic.com',
                '*.googleapis.com',
                '*.facebook.com',
                '*.fbcdn.net',
            ])
            ->addDirective(Directive::MEDIA, [
                Keyword::SELF
            ])
            ->addDirective(Directive::OBJECT, [
                Keyword::NONE,
            ])
            ->addDirective(Directive::SCRIPT, [
                Keyword::STRICT_DYNAMIC,
                'sha256-x1e8vcgVIbQJccF2wQ79XGq1vniIt0sZSGt/eFcfzag=',  // this line is for saptie media library responsive pistures inline script
                'sha256-9K+fEDqIyD+XahBDIsS1HJfWaTCI321eBrwKwbRaQ1g=',
                Keyword::UNSAFE_INLINE, // ignored by browsers supporting 'nonce/hashes', but to be backward compatible with older browsers
                Scheme::HTTPS,          // ignored by browsers supporting 'strict-dynamic', but to be backward compatible with older browsers
            ])
            // ->addDirective('require-trusted-types-for', 'script')   //TODO: Pull-Request new CSP directives to Spatie package
            ->addDirective(Directive::STYLE, [
                Keyword::SELF,
                // Keyword::UNSAFE_INLINE,    // 'unsafe-inline' is dangerous, but i need it enabled for background images OR enabled nonce for styles
                'fonts.googleapis.com',
                'maps.googleapis.com',
                'cdnjs.cloudflare.com',
            ]);

        if (App::environment('production')) {
            $this->reportTo('https://faradetva.report-uri.com/r/d/csp/enforce');
        }
    }

    public function shouldBeApplied(Request $request, Response $response): bool {
        if (config('app.debug') && ($response->isClientError() || $response->isServerError())) {
            return false;
        }

        return parent::shouldBeApplied($request, $response);
    }
}
