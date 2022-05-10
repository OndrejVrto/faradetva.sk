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
    protected $url;


    /**
     * Perform the actual verification of this check.
     *
     * @param array $config
     * @return bool
     */
    public function check(array $config): bool
    {
        $this->url = $config['url'];

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

        if ($this->certificateDaysUntilExpiration < 0) {
            $result->failed("health-results.ssl_certificate.failed_expired");
            goto AddMeta;
        }

        if (!$this->hostCoveredByCertificate($urlParts['host'], $this->certificateDomain, $this->certificateAdditionalDomains) ) {
            $result->failed("health-results.ssl_certificate.failed_uncovered_host");
            goto AddMeta;
        }

        $result->ok("health-results.ssl_certificate.ok");

        AddMeta:

        // dd(
        //     $urlParts,
        //     $this->certificateInfo,
        //     $this->certificateExpiration,
        //     $this->certificateDomain,
        //     $this->certificateAdditionalDomains,
        //     $this->certificateDaysUntilExpiration,
        //     $this->url,
        // );

        return $result->shortSummary("health-results.ssl_certificate.short")
            ->meta([
            'url'            => $this->url,
            'host'           => $urlParts['host'],
            'daysRemaining'  => $this->certificateDaysUntilExpiration,
            'dateExpiration' => $this->certificateExpiration,
        ]);
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
