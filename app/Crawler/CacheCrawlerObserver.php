<?php

namespace App\Crawler;

use App\Models\StaticPage;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class CacheCrawlerObserver extends \Spatie\Crawler\CrawlObservers\CrawlObserver
{
    private $pages;
    
    private $loging = false;

    private $updateDB;

    public function __construct(bool $updateDB = false)
    {
        $this->updateDB = $updateDB;

        if (App::environment(['local', 'dev', 'staging'])) {
            $this->loging = true;
        }
    }

    /**
     * Called when the crawler will crawl the url.
     */
    public function willCrawl(UriInterface $url): void
    {
        if($this->loging){
            // Log::info("Now crawling: " . (string) $url);
        }
    }

    /**
     * Called when the crawler has crawled the given url successfully.
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ): void {

        $mineTypes = [
            'text/html',
            'text/html; charset=UTF-8',
            'text/plain',
            'text/plain; charset=UTF-8',
        ];

        if (in_array($response->getHeader('Content-Type')[0], $mineTypes)) {
            if ($this->updateDB) {
                $pageExistinDB = StaticPage::whereUrl(substr($url->getPath(), 1))->first();
                if ($pageExistinDB) {
                    $pageExistinDB->update([
                        'check_url' => true,
                    ]);
                }
            }
            
            $fullPath = (string) $url;
            Cache::forever('X_FRONTEND_'.md5($fullPath), (string)$response->getBody());
            if($this->loging){
                Log::info("Process: ". $fullPath);
                $this->pages[] = $fullPath;
            }
        }
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ): void {
        if($this->loging){
            Log::info('Failed: ' . (string) $url);
        }
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
        if($this->loging){
            Log::info('Crawled ' . count($this->pages) . ' urls');
        }
    }
}
