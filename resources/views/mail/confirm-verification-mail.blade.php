@component('mail::message')
<h1>Gratulujeme Váš e-mail bol overený</h1>
<br>
S pozdravom,
<h3>{{ config('app.name') }}</h3>
<p style="color: #f16565">{{ route('home') }}</p>
<br>
<p>Pre zrušenie odberu noviniek použite nasledovný link</p>
@component('mail::button', ['url' => route('unsubscribe',[$slug, $uuid, $unsubscribeToken])])
Odhlásiť
@endcomponent
@endcomponent
