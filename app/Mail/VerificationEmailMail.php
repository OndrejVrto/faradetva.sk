<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmailMail extends Mailable implements ShouldQueue {
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 2;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $backoff = 5;

    public $token;
    public $uuid;
    public $slug;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber) {
        $this->slug = Str::slug(Str::replace('.', '-', $subscriber->email));
        $this->uuid = $subscriber->uuid;
        $this->token = $subscriber->verified_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('mail.verification-mail', [
            'slug' => $this->slug,
            'uuid' => $this->uuid,
            'token' => $this->token,
        ]);
    }
}
