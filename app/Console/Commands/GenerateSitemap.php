<?php declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateSitemapJob;

class GenerateSitemap extends Command {
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle(): void {
        dispatch((new GenerateSitemapJob()));

        $this->warn('Add generate sitemap to jobs.');
    }
}
