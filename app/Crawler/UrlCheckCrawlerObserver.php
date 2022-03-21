<?php

namespace App\Crawler;

use App\Models\StaticPage;
use Illuminate\Support\Arr;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObservers\CrawlObserver;

class UrlCheckCrawlerObserver extends CrawlObserver
{
    private int $pages = 0;

    private $loging = false;

    public function __construct()
    {
        if (App::environment(['local', 'dev', 'staging'])) {
            $this->loging = true;
        }
    }

    /**
     * Called when the crawler will crawl the url.
     */
    public function willCrawl(UriInterface $url): void
    {
        // if($this->loging){
        //     Log::info("Now crawling: " . (string) $url);
        // }
    }

    /**
     * Called when the crawler has crawled the given url successfully.
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ): void {

        if( Arr::exists($response->getHeaders(), 'Content-Type') ){

            $mineTypes = [
                'text/html',
                'text/html; charset=UTF-8',
                'text/plain',
                'text/plain; charset=UTF-8',
            ];

            if (in_array($response->getHeader('Content-Type')[0], $mineTypes)) {
                $pageExistinDB = StaticPage::whereUrl(substr($url->getPath(), 1))->first();

                if ($pageExistinDB) {
                    $pageExistinDB->update([
                        'check_url' => true,
                    ]);
                }

                if($this->loging){
                    $fullPath = (string) $url;
                    Log::info("Process: ". $fullPath);
                    $this->pages++;
                }
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
            Log::info('Crawled ' . $this->pages . ' urls');
        }
    }
}
