@component('mail::message')
<h1>Overenie emailovej adresy</h1>
<br>
<p>Pre potreby zasielania noviniek je nutné overiť existenciu e-mailovej adresy.</p>
@component('mail::button', ['url' => route('verify-mail',[$slug, $uuid, $token])])
Overiť
@endcomponent
<br>
S pozdravom,
<h3>{{ config('app.name') }}</h3>
<p style="color: #f16565">{{ route('home') }}</p>
@endcomponent
