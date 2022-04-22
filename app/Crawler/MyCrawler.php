<?php

namespace App\Crawler;

use GuzzleHttp\RequestOptions;
use Spatie\Crawler\Crawler as BaseCrawler;

class MyCrawler extends BaseCrawler
{
	protected static array $defaultClientOptions = [
		RequestOptions::COOKIES => true,
		RequestOptions::CONNECT_TIMEOUT => 10,
		RequestOptions::TIMEOUT => 10,
		RequestOptions::ALLOW_REDIRECTS => false,
		RequestOptions::HEADERS => [
			'User-Agent' => self::DEFAULT_USER_AGENT,
		],
		'verify' => false // This is what you need to add  -  https://github.com/spatie/crawler/discussions/348
	];
}

