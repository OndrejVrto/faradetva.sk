<?php declare(strict_types=1);

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmVerificationMail extends Mailable implements ShouldQueue {
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

    public string $slug;
    public string $uuid;
    public string $unsubscribeToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber) {
        $this->slug             = Str::slug(Str::replace('.', '-', $subscriber->email));
        $this->uuid             = $subscriber->uuid;
        $this->unsubscribeToken = $subscriber->unsubscribe_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self {
        return $this->markdown('mail.confirm-verification-mail', [
            'slug'             => $this->slug,
            'uuid'             => $this->uuid,
            'unsubscribeToken' => $this->unsubscribeToken,
        ]);
    }
}
