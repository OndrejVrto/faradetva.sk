<?php

namespace App\Services;

use App\Jobs\CheckUrlsJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class CrawlUrlsService
{
    public function __construct() {
        File::delete(storage_path('/logs/laravel.log'));
        // File::delete(storage_path('/logs/query.log'));

        DB::select('UPDATE `static_pages` SET `check_url` = NULL WHERE `check_url` = 1;');
        dispatch(new CheckUrlsJob());

        Artisan::call('site-search:crawl');

        Cache::forever('___RELOAD', false);
    }
}
