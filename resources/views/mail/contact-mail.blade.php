@component('mail::message')
<h1>Správa z kontaktného formulára ({{ config('app.url').'/kontakty' }})</h1>
<br>
E-Mail pre odpoveď:
<p style="color: #f16565; font-weight: bold;">{{ $contact['email'] }}</p>
Meno odosiľateľa:
<p style="color: #f16565">{{ $contact['name'] }}</p>
Telefónne číslo:
<p style="color: #f16565">{{ $contact['contact'] }}</p>
Adresa:
<p style="color: #f16565">{{ $contact['address'] }}</p>
Text správy:
<p style="color: #f16565">{{ $contact['message'] }}</p>
<br>
<br>
S pozdravom,
<h3>{{ config('app.name') }}</h3>
<p style="color: #f16565">{{ route('home') }}</p>
@endcomponent
