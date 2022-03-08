<?php

namespace App\Services;

use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class CheckUrlsService
{
    private $pages;

    private $updateDB = false;

    public function checkUrl(Collection|array $listPages): void {

        if ($listPages instanceof \Illuminate\Database\Eloquent\Collection) {
            $this->pages = $listPages->pluck('url', 'id')->toArray();
            $this->updateDB = true;
        }

        if (is_array($listPages) ) {
            $this->pages = $listPages;
        }

        foreach($this->pages as $pageID => $pageUrl) {

            $url = config('app.url') . '/' . $pageUrl;
            $headers = @get_headers($url, true);

            if ($this->updateDB) {
                $exists = ($headers && strpos( $headers[0], '200')) ? true : false;
                StaticPage::find((int)$pageID)->update([
                    'check_url' => (int)$exists,
                ]);
            }
        }

        Cache::forever('___RELOAD', false);
    }
}
