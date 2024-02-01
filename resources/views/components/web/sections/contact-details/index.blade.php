<x-web.page.section
    name="CONTACT DETAILS"
    {{-- row="true" --}}
    class="ch_contact_section"
>

    <ul class="row ch_address_details mt-0">

        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="0.2s">
            <span><i class="fa-solid fa-map-marker-alt" aria-hidden="true"></i></span>
            <div>
                <p>
                    <strong>Rímskokatolícka cirkev</strong><br>
                    <strong>Farnosť sv. Františka Assiského</strong><br>
                    Partizánska ul. 64<br>
                    962 12&nbsp;&nbsp;&nbsp;Detva<br>
                </p>
            </div>
        </li>
        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="0.4s">
            <span><i class="fa-solid fa-phone-volume" aria-hidden="true"></i></span>
            <div>
                <p>(+421) (045) 54 55 243</p>
            </div>
        </li>
        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="0.6s">
            <span><i class="fa-regular fa-envelope" aria-hidden="true"></i></span>
            <div>
                <x-partials.email-link
                    email="detva@fara.sk"
                    nonce="{{ csp_nonce() }}"
                    class="link-template-gray"
                    :icon="null"
                />
            </div>
        </li>
        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="0.8s">
            <span><i class="fa-regular fa-credit-card" aria-hidden="true"></i></span>
            <div>
                <span class="text-muted">IČO</span>
                <p>31938779</p>
            </div>
        </li>
        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="1s">
            <span><i class="fa-solid fa-university fa-lg" aria-hidden="true"></i></span>
            <div>
                <span class="text-muted">IBAN</span>
                <p>SK28 0900 0000 0000 7162 8858</p>
            </div>
        </li>
        <li class="col-md-6 col-lg-4 fromright wow" data-wow-delay="1.2s">
            <span><i class="fa-solid fa-location-crosshairs fa-lg" aria-hidden="true"></i></span>
            <div>
                <span class="text-muted">GPS</span>
                <p class="font-monospace">48.55924</p>
                <p class="font-monospace">19.41873</p>
            </div>
        </li>

    </ul>

        {{-- <div class="clearfix"></div>

        <h2 class="contact_heading fromright wow mt-4" data-wow-delay="1.2s">Náuky</h2>

        <h5 class="fromright wow" data-wow-delay="1.4s">
            Sobášne
        </h5>
        <p class="fromright wow" data-wow-delay="1.4s">
            Pondelok o 18.30 h. podľa <a href="#" class="read_m_link" target="_blank" rel="external noopener noreferrer">rozpisu.</a>
        </p>
        <h5 class="fromright wow" data-wow-delay="1.6s">
            Krstné
        </h5>
        <p class="fromright wow" data-wow-delay="1.6s">
            Streda o 18.30 h.
        </p> --}}

</x-web.page.section>
