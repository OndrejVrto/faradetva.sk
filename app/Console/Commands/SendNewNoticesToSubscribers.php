<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Subscriber;
use App\Mail\NewsNoticesMail;
use App\Enums\SubscribeModels;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewNoticesToSubscribers extends Command {
    /** The name and signature of the console command. */
    protected $signature = 'notification:send-news-subscribers';

    /** The console command description. */
    protected $description = 'Sends notifications of news to subscribers.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $counterSubscribers = 0;
        $counterItems = 0;

        foreach (SubscribeModels::cases() as $case) {
            $model      = new $case->value();
            $modelName  = $case->value;
            $this->warn('Subscribe model: '. $modelName);

            $items = $model::query()
                    ->visible()
                    ->whereNotified(0)
                    ->get();

            $subscribers = Subscriber::query()
                    ->where('model_type', $modelName)
                    ->whereNotNull('email_verified_at')
                    ->get();

            foreach ($subscribers as $subscriber) {
                $counterSubscribers++;

                // info($counterSubscribers.'. Send Email to '.$subscriber->email.' with '.count($items).' items.');

                // TODO: Enable send email only in production because in Mailtrap.io is free only 500email/month
                // Mail::to($subscriber->email)->send(new NewsNoticesMail($items));
            }

            foreach ($items as $item) {
                $counterItems++;
                $item->update([
                    'notified' => true
                ]);
            }

            $this->line('Count of subscribers: '.count($subscribers));
            $this->line('Count of items: '.count($items));
            $this->newLine();
        }

        $this->info('Notify '.$counterSubscribers.' subscriber with '.$counterItems.' items successfully.');
    }
}
