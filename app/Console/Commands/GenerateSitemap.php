<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateSitemapJob;

class GenerateSitemap extends Command {
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        dispatch((new GenerateSitemapJob()));

        $this->warn('Add generate sitemap to jobs.');
    }
}
