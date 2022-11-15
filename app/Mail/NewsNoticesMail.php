<?php declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class NewsNoticesMail extends Mailable implements ShouldQueue {
    use Queueable;
    use SerializesModels;

    public int $tries = 5;

    public Collection $items;

    public function __construct(EloquentCollection $items) {
        $this->items = $items->pluck('slug');

        $this->onQueue('subscribe-emails')->delay(2);
    }

    public function build(): self {
        return $this->markdown('mail.news-notices', ['items' => $this->items]);
    }

    public function retryUntil(): Carbon {
        return now()->addMinute();
    }

    public function backoff(): array {
        return [1, 5, 10, 30, 60];
    }
}
