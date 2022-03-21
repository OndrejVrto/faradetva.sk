<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function sendEmail(ContactFormRequest $request)  {

        $validated = $request->validated();

        Mail::alwaysFrom('kontaktny-formular@faradetva.sk', 'WWW stránka farnosti Detva');
        Mail::to('detva@fara.sk')->send(new ContactMail($validated));

        return back()->with('success_message', 'Vaša správa bola odoslaná.');
    }
}
