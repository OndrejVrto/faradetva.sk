@component('mail::message')
# Správa z kontaktného formulára
{{ config('app.url').'/kontakty' }}
<br>
<br>
## E-Mail pre odpoveď:
<span style="color: #f16565; font-weight: bold;">{{ $contact['email'] }}</span>
## Meno odosiľateľa:
<span style="color: #f16565">{{ $contact['name'] }}</span>
## Telefónne číslo:
<span style="color: #f16565">{{ $contact['contact'] }}</span>
## Adresa:
<span style="color: #f16565">{{ $contact['address'] }}</span>
<br>
<br>
## Text správy:
<span style="color: #f16565">{{ $contact['message'] }}</span>
<br>
<br>
<br>
<br>
S pozdravom,
<br>
WWW stránka {{ config('app.name') }}
@endcomponent
