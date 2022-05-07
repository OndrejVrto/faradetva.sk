<?php

namespace App\Http\Controllers\Web;

use App\Models\Subscriber;
use Illuminate\Http\Response;
use App\Mail\ConfirmUnscribeMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmVerificationMail;

class SubscribeController extends Controller
{
    public function verifyMail($slug, Subscriber $subscriber, $token) {
        if ($subscriber->email_verified_at !== null) {
            return to_route('home');
        }
        if( $subscriber->verified_token !== trim($token)) {
            abort(Response::HTTP_NOT_FOUND);  // 404
        }

        $subscriber->email_verified_at = now()->timestamp;
        $subscriber->save();

        Mail::to($subscriber->email)->send(new ConfirmVerificationMail($subscriber));
        Log::debug('CONFIRM: Email '.$subscriber->email.' verifikovaný');
        return view('frontend.info.confirm-verification', compact('subscriber'));
    }

    public function unsubscribe($slug, Subscriber $subscriber, $unsubscribetoken) {
        if( $subscriber->unsubscribe_token !== trim($unsubscribetoken)) {
            abort(Response::HTTP_NOT_FOUND);  // 404
        }

        $subscriber->delete();
        Mail::to($subscriber->email)->send(new ConfirmUnscribeMail($subscriber));
        Log::info('DELETE: Email '.$subscriber->email.' zmazaný');
        return view('frontend.info.confirm-unscribe', compact('subscriber'));
    }
}
