<?php declare(strict_types=1);

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class SslCertificateValidCheck extends Check {
    /**  @var array */
    protected array $certificateInfo;

    /**  @var string */
    protected string $certificateExpiration;

    /**  @var string */
    protected string $certificateDomain;

    /**  @var array */
    protected array $certificateAdditionalDomains = [];

    /**  @var int */
    protected int $certificateDaysUntilExpiration;

    /**  @var string */
    public ?string $url = null;

    /**  @var int */
    protected int $warningThreshold = 20;

    /**  @var int */
    protected int $errorThreshold = 14;

    /**
     * @return $this
     */
    public function warnWhenSslCertificationExpiringDay(int $day): self {
        $this->warningThreshold = $day;

        return $this;
    }

    /**
     * @return $this
     */
    public function failWhenSslCertificationExpiringDay(int $day): self {
        $this->errorThreshold = $day;

        return $this;
    }

    /**
     * @return $this
     */
    public function url(string $url): self {
        $this->url = $url;

        return $this;
    }

    /**
     * Perform the actual verification of this check.
     */
    public function check(array $config): bool {
        if ($this->url == null) {
            $this->url = $config['url'];
        }

        $urlParts = $this->parseUrl($this->url);

        if (!$urlParts) {
            return false;
        }

        try {
            $this->certificateInfo = $this->downloadCertificate($urlParts);
        } catch (\Exception) {
            return false;
        }

        $this->processCertificate($this->certificateInfo);
        return
            $this->certificateDaysUntilExpiration >= 0
            &&
            $this->hostCoveredByCertificate(
                host: $urlParts['host'],
                certificateHost: $this->certificateDomain,
                certificateAdditionalDomains: $this->certificateAdditionalDomains
            );
    }

    public function run(): Result {
        $name = 'health-results.ssl_certificate';
        $this->label("$name.label");

        $result = Result::make();

        $this->url = config('app.url');
        $urlParts = $this->parseUrl($this->url);

        if (!$urlParts) {
            return $result->failed("$name.failed_bad_url")->meta([
                'url' => $this->url,
            ]);
        }

        try {
            $this->certificateInfo = $this->downloadCertificate($urlParts);
        } catch (\Exception) {
            return $result->failed("$name.failed_certificate_non_exist")->meta([
                'url' => $this->url,
            ]);
        }

        $this->processCertificate($this->certificateInfo);

        $result->shortSummary("$name.short")
            ->meta([
                'url'            => $this->url,
                'host'           => $urlParts['host'],
                'daysRemaining'  => $this->certificateDaysUntilExpiration,
                'dateExpiration' => $this->certificateExpiration,
            ]);

        if (!$this->hostCoveredByCertificate($urlParts['host'], $this->certificateDomain, $this->certificateAdditionalDomains)) {
            return $result->failed("$name.failed_uncovered_host");
        }

        if ($this->certificateDaysUntilExpiration < 0) {
            return $result->failed("$name.failed_expired");
        }

        if ($this->certificateDaysUntilExpiration < $this->errorThreshold) {
            return $result->failed("$name.failed_expired_soon");
        }

        if ($this->certificateDaysUntilExpiration < $this->warningThreshold) {
            return $result->warning("$name.failed_expired_soon");
        }

        return $result->notificationMessage("$name.ok")->ok();
    }

    protected function downloadCertificate(array $urlParts): array {
        $streamContext = stream_context_create([
            'ssl' => [
                'capture_peer_cert' => true
            ]
        ]);

        $streamClient = stream_socket_client(
            "ssl://{$urlParts['host']}:443",
            $errno,
            $errstr,
            30,
            STREAM_CLIENT_CONNECT,
            $streamContext
        );

        $certificateContext = stream_context_get_params($streamClient);

        return openssl_x509_parse($certificateContext['options']['ssl']['peer_certificate']);
    }

    public function processCertificate(array $certificateInfo): void {
        if (!empty($certificateInfo['subject']) && !empty($certificateInfo['subject']['CN'])) {
            $this->certificateDomain = $certificateInfo['subject']['CN'];
        }

        if (!empty($certificateInfo['validTo_time_t'])) {
            $validTo = Carbon::createFromTimestampUTC($certificateInfo['validTo_time_t']);
            $this->certificateExpiration = $validTo->toDateString();
            $this->certificateDaysUntilExpiration = -$validTo->diffInDays(Carbon::now(), false);
        }

        if (!empty($certificateInfo['extensions']) && !empty($certificateInfo['extensions']['subjectAltName'])) {
            $this->certificateAdditionalDomains = [];
            $domains = explode(', ', (string) $certificateInfo['extensions']['subjectAltName']);

            foreach ($domains as $domain) {
                $this->certificateAdditionalDomains[] = str_replace('DNS:', '', $domain);
            }
        }
    }

    public function hostCoveredByCertificate(string $host, string $certificateHost, array $certificateAdditionalDomains = []): bool {
        if ($host === $certificateHost) {
            return true;
        }

        // Determine if wildcard domain covers the host domain
        if ($certificateHost[0] == '*' && substr_count($host, '.') > 1) {
            $certificateHost = substr($certificateHost, 1);
            $host = substr($host, strpos($host, '.'));
            return $certificateHost === $host;
        }

        // Determine if the host domain is in the certificate's additional domains
        return in_array($host, $certificateAdditionalDomains, true);
    }

    protected function parseUrl(string $url): array|string|int|null|false {
        $urlParts = parse_url($url);

        if (!$urlParts) {
            return false;
        }

        if (empty($urlParts['scheme']) || $urlParts['scheme'] !== 'https') {
            return false;
        }

        return $urlParts;
    }
}
