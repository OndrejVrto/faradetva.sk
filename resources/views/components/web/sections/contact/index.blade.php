<x-web.page.section
    name="CONTACT"
    row="true"
    class="ch_contact_section pt-5"
>
    <div class="col-lg-6 col-12">
        <div class="ch_contact_form fromleft wow">
            <h2 class="contact_heading">Kontaktný formulár</h2>
            <div class="contact_form_wrap">

                <livewire:contact-form />

            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 order-lg-last">
        <div class="contact_details">

            <ul class="ch_address_details mt-0">
                <li class="fromright wow" data-wow-delay="0.2s">
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
                <li class="fromright wow" data-wow-delay="0.4s">
                    <span><i class="fa-solid fa-phone-volume" aria-hidden="true"></i></span>
                    <div>
                        <p>(+421) (045) 54 55 243</p>
                        {{-- <p>(+421) 0907 123 456</p> --}}
                    </div>
                </li>
                <li class="fromright wow" data-wow-delay="0.6s">
                    <span><i class="fa-regular fa-envelope" aria-hidden="true"></i></span>
                    <div>
                        <script @nonce>
                            var part1 = "detva";
                            var part2 = Math.pow(2,6);
                            var part3 = String.fromCharCode(part2);
                            var part4 = "fara.sk";
                            var part5 = part1 + String.fromCharCode(part2) + part4;
                            document.write(
                                "<a class='link-template-gray' href=" + "mai" + "lto" + ":" + part5 + ">"
                                + part1 + part3 + part4
                                + "</a>"
                            );
                        </script>
                    </div>
                </li>
                <li class="fromright wow" data-wow-delay="0.8s">
                    <span><i class="fa-regular fa-credit-card" aria-hidden="true"></i></span>
                    <div>
                        <span class="text-muted">IČO</span>
                        <p>31938779</p>
                    </div>
                </li>
                <li class="fromright wow" data-wow-delay="1s">
                    <span><i class="fa-solid fa-university fa-lg" aria-hidden="true"></i></span>
                    <div>
                        <span class="text-muted">IBAN</span>
                        <p>SK28 0900 0000 0000 7162 8858</p>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>

            <h2 class="contact_heading fromright wow mt-4" data-wow-delay="1.2s">Náuky</h2>

            <h5 class="fromright wow" data-wow-delay="1.4s">
                Sobášne
            </h5>
            <p class="fromright wow" data-wow-delay="1.4s">
                Pondelok o 18.30 h. podľa <a href="#" class="read_m_link" target="_blank" rel="noopener noreferrer">rozpisu.</a>
            </p>
            <h5 class="fromright wow" data-wow-delay="1.6s">
                Krstné
            </h5>
            <p class="fromright wow" data-wow-delay="1.6s">
                Streda o 18.30 h.
            </p>
        </div>
    </div>
</x-web.page.section>
