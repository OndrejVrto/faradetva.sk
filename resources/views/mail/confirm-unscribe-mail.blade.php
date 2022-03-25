@component('mail::message')
<h1>Vás e-mail bol odhlásený z odberu noviniek</h1>
<br>
<p>Vďaka <span style="color: #f16565">{{ $subscriber->name }}</span> za používanie tejto služby</p>
<br>
S pozdravom,
<h3>{{ config('app.name') }}</h3>
<p style="color: #f16565">{{ route('home') }}</p>
@endcomponent
