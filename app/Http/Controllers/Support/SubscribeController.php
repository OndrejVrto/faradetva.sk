<?php

declare(strict_types=1);

namespace App\Http\Controllers\Support;

use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Response;
use App\Mail\ConfirmUnscribeMail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmVerificationMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class SubscribeController extends Controller {
    public function verifyMail(string $slug, Subscriber $subscriber, string $token): View|Factory|RedirectResponse {
        if ($subscriber->email_verified_at !== null) {
            return to_route('home');
        }

        if ($subscriber->verified_token !== trim($token)) {
            abort(Response::HTTP_NOT_FOUND);  // 404
        }

        $subscriber->email_verified_at = Carbon::now();
        $subscriber->save();

        Mail::to($subscriber->email)->send(new ConfirmVerificationMail($subscriber));
        Log::notice('CONFIRM: Email '.$subscriber->email.' verifikovaný');

        return view('web.info.confirm-verification', compact('subscriber'));
    }

    public function unsubscribe(string $slug, Subscriber $subscriber, string $unsubscribetoken): View|Factory {
        if ($subscriber->unsubscribe_token !== trim($unsubscribetoken)) {
            abort(Response::HTTP_NOT_FOUND);  // 404
        }

        $subscriber->delete();

        Mail::to($subscriber->email)->send(new ConfirmUnscribeMail($subscriber));
        Log::notice('DELETE: Email '.$subscriber->email.' zmazaný');

        return view('web.info.confirm-unscribe', compact('subscriber'));
    }
}
