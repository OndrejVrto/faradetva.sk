<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $emailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData) {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.contact-mail', ['emailData' => $this->emailData]);
    }
}
