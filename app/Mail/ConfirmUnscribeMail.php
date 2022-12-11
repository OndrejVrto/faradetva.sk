<?php declare(strict_types=1);

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmUnscribeMail extends Mailable implements ShouldQueue {
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     */
    public int $tries = 2;

    /**
     * The number of seconds to wait before retrying the job.
     *
     */
    public int $backoff = 5;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Subscriber $subscriber
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self {
        return $this->markdown('mail.confirm-unscribe-mail', [
            'subscriber' => $this->subscriber,
        ]);
    }
}
