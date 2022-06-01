<?php

namespace App\Services\Health\Checks;

use Carbon\Carbon;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class SslCertificateValidCheck extends Check
{
    /**  @var array */
    protected $certificateInfo;

    /**  @var string */
    protected $certificateExpiration;

    /**  @var string */
    protected $certificateDomain;

    /**  @var array */
    protected $certificateAdditionalDomains = [];

    /**  @var int */
    protected $certificateDaysUntilExpiration;

    /**  @var string */
    public ?string $url = null;

    /**  @var int */
    protected int $warningThreshold = 20;

    /**  @var int */
    protected int $errorThreshold = 14;

    /**
     * @param int $day
     *
     * @return $this
     */
    public function warnWhenSslCertificationExpiringDay(int $day): self
    {
        $this->warningThreshold = $day;

        return $this;
    }

    /**
     * @param int $day
     *
     * @return $this
     */
    public function failWhenSslCertificationExpiringDay(int $day): self
    {
        $this->errorThreshold = $day;

        return $this;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function url(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Perform the actual verification of this check.
     *
     * @param array $config
     * @return bool
     */
    public function check(array $config): bool
    {
        if ($this->url === null) {
            $this->url = $config['url'];
        }

        $urlParts = $this->parseUrl($this->url);

        if (!$urlParts) {
            return false;
        }

        try {
            $this->certificateInfo = $this->downloadCertificate($urlParts);
        } catch (\Exception $e) {
            return false;
        }

        $this->processCertificate($this->certificateInfo);

        if (
            $this->certificateDaysUntilExpiration < 0 ||
            !$this->hostCoveredByCertificate(
                $urlParts['host'], $this->certificateDomain,
                $this->certificateAdditionalDomains
            )
        ) {
            return false;
        }

        return true;
    }

    public function run(): Result {
        $this->label('health-results.ssl_certificate.label');
        $result = Result::make();

        $this->url = config('app.url');
        $urlParts = $this->parseUrl($this->url);

        if (!$urlParts) {
            return $result->failed("health-results.ssl_certificate.failed_bad_url")->meta([
                'url' => $this->url,
            ]);
        }

        try {
            $this->certificateInfo = $this->downloadCertificate($urlParts);
        } catch (\Exception $e) {
            return $result->failed("health-results.ssl_certificate.failed_certificate_non_exist")->meta([
                'url' => $this->url,
            ]);
        }

        $this->processCertificate($this->certificateInfo);

        $result->shortSummary("health-results.ssl_certificate.short")
            ->meta([
            'url'            => $this->url,
            'host'           => $urlParts['host'],
            'daysRemaining'  => $this->certificateDaysUntilExpiration,
            'dateExpiration' => $this->certificateExpiration,
        ]);

        if (!$this->hostCoveredByCertificate($urlParts['host'], $this->certificateDomain, $this->certificateAdditionalDomains) ) {
            return $result->failed("health-results.ssl_certificate.failed_uncovered_host");
        }

        if ($this->certificateDaysUntilExpiration < 0) {
            return $result->failed("health-results.ssl_certificate.failed_expired");
        }

        if ($this->certificateDaysUntilExpiration < $this->errorThreshold) {
            return $result->failed("health-results.ssl_certificate.failed_expired_soon");
        }

        if ($this->certificateDaysUntilExpiration < $this->warningThreshold) {
            return $result->warning("health-results.ssl_certificate.failed_expired_soon");
        }

        return $result->notificationMessage("health-results.ssl_certificate.ok")->ok();
    }

    protected function downloadCertificate($urlParts)
    {
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

    public function processCertificate($certificateInfo)
    {
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
            $domains = explode(', ', $certificateInfo['extensions']['subjectAltName']);

            foreach ($domains as $domain) {
                $this->certificateAdditionalDomains[] = str_replace('DNS:', '', $domain);
            }
        }
    }

    public function hostCoveredByCertificate($host, $certificateHost, array $certificateAdditionalDomains = [])
    {
        if ($host == $certificateHost) {
            return true;
        }

        // Determine if wildcard domain covers the host domain
        if ($certificateHost[0] === '*' && substr_count($host, '.') > 1) {
            $certificateHost = substr($certificateHost, 1);
            $host = substr($host, strpos($host, '.'));
            return $certificateHost == $host;
        }

        // Determine if the host domain is in the certificate's additional domains
        return in_array($host, $certificateAdditionalDomains, true);
    }

    protected function parseUrl($url)
    {
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
