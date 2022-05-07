<!-- GOOGLE MAP section Start -->
    <section class="section ch_map_section">
        <div id="contact_map"></div>
    </section>
<!-- GOOGLE MAP section End -->

@push('js')
<!-- GOOGLE MAP script Start -->
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/app-google-map.js'), true) }}"></script>
    <script @nonce async rel="dns-prefetch" src="https://maps.googleapis.com/maps/api/js?key={{ config('farnost-detva.google_api_key') }}&callback=initMap"></script>
<!-- GOOGLE MAP script End -->
@endpush
