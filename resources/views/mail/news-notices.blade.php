@component('mail::message')
<h1>Na stránke boli pridané novinky</h1>
<br>
@foreach ($items as $item)
<p>{{ $item }}</p>
@endforeach
{{-- @component('mail::button', ['url' => route('verify-mail',[$slug, $uuid, $token])])
Overiť
@endcomponent --}}
<br>
S pozdravom,
<h3>{{ config('app.name') }}</h3>
<p style="color: #f16565">{{ route('home') }}</p>
@endcomponent
