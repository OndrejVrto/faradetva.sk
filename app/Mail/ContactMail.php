<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable implements ShouldQueue {
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public int $tries = 2;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public int $backoff = 5;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        private readonly array $contact
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('mail.contact-mail', ['contact' => $this->contact]);
    }
}
