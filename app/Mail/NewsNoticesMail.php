<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsNoticesMail extends Mailable implements ShouldQueue {
    use Queueable;
    use SerializesModels;

    public $tries = 5;

    public $items;

    public function __construct($items) {
        info($items->pluck('slug'));
        $this->items = $items->pluck('slug');

        $this->onQueue('subscribe-emails')->delay(2);
    }

    public function build() {
        return $this->markdown('mail.news-notices', ['items' => $this->items]);
    }

    public function retryUntil() {
        return now()->addMinute();
    }
    public function backoff() {
        return [1, 5, 10, 30, 60];
    }
}
