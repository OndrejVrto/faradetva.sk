<!-- FOOTER section Start -->
    <footer class="footer_section d-print-none">
        <div class="footer_main_section">
            <div class="container">
                <div class="row">

                    <div class="col-sm-7 col-lg-4 col-xl-5">
                        <div class="widget widget_text">
                            <div class="text_widget">
                                <div class="ftr_logo d-flex justify-content-start">
                                    <a href="{{ route('home') }}" class="text-decoration-none d-flex justify-content-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 500 500" class="mb-2">
                                            <circle fill="#ff7b33" stroke="#ff7b33" stroke-width="4" cx="250" cy="250" r="240"/>

                                            <path fill="#1b2e41" stroke="#1b2e41" stroke-width="7" stroke-linejoin="round" d="m118.787 230.579 65.859-14.322-1.975 31.566-35.322 6.537zM272.33 47.512l.436 70.584 32.06-7.47-1.537-57.09s-10.335-2.651-15.494-3.627c-5.16-.975-15.464-2.397-15.464-2.397zM354.516 117.962l28.483 26.52 5.062 67.874-81.192 14.208 7.034 216.013s-13.651 4.301-20.514 5.935c-6.863 1.635-20.603 3.652-20.603 3.652l-.218-253.83 87.34-18.178z"/>

                                            <path fill="#fff" stroke="#1b2e41" stroke-width="7" stroke-linejoin="round" d="M455.542 246.2c0 106.951-89.854 201.63-195.866 207.16l-.363-267.206 84.824-17.915-4.556-50.908-80.356 18.906.138-125.49c-3.582-.207-5.731-.24-9.363-.24C117.731 10.505 10.506 117.73 10.506 250c0 102.738 62.798 189.662 153.554 223.544l3.597-37.973C96.37 403.588 46.372 331.657 46.372 250c0-55.113 23.351-106.02 60.48-143.149 27.117-27.117 61.583-46.884 100.179-55.72l-4.898 98.795-80.73 19.148-2.817 46.66 80.466-16.881L180.25 479.1c21.627 6.763 44.848 10.393 69.75 10.393 132.269 0 239.494-107.225 239.494-239.494 0-125.24-94.497-227.88-217.016-238.463l-.17 36.084C373.431 57.855 455.541 142.854 455.541 246.2z"/>
                                        </svg>
                                        <h2 class="ms-4 widget-title">Farnosť Detva</h2>
                                    </a>
                                </div>

                                <x-partials.day-idea />

                                <h2 class="widget-title mt-4">Dôležité odkazy</h2>
                                <ul class="mb-4 row">
                                    <div class="col-5">
                                        <li><a class="link-template-gray" href="{{ secure_url('kontakty') }}">Kontakty</a></li>
                                        <li><a class="link-template-gray" href="{{ secure_url('farske-oznamy') }}">Sväté omše</a></li>
                                        <li><a class="link-template-gray" href="{{ secure_url('prehlad-vsetkych-stranok') }}">Všetky stránky</a></li>
                                        <li><a class="link-template-gray" href="{{ secure_url('o-nas/pastoracia/lektori#rozpis') }}">Rozpis lektorov</a></li>
                                    </div>
                                    <div class="col-7">
                                        <li><a class="link-template-gray" href="{{ secure_url('o-nas/pastoracia/akolyti#rozpis') }}">Rozpis akolytov</a></li>
                                        <li><a class="link-template-gray" href="{{ route('faq') }}">Otázky a odpovede</a></li>
                                        <li><a class="link-template-gray" href="{{ secure_url('duchovny-zivot/sviatosti/manzelstvo#rozpis') }}">Príprava snúbencov</a></li>
                                        <li><a target="_blank" rel="noopener noreferrer" class="link-template-gray" href="https://gdpr.kbs.sk">Ochrana osobných údajov</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 col-lg-4 col-xl-3">
                        <div class="widget widget_social">
                            <h2 class="widget-title">Sväté omše</h2>
                            <div class="h5 text-white"><strong>Pondelok - Piatok</strong></div>
                                Farský kostol - 17:30 <br>
                                Kláštor - 7:00
                            <div class="h5 text-white mt-2"><strong>Sobota</strong></div>
                                Farský kostol - 7:30, 17:30 <br>
                                Kláštor - 7:00
                            <div class="h5 text-white mt-2"><strong>Nedeľa</strong></div>
                                Farský kostol - 7:45, 9:00, 10:30, 17:30 <br>
                                Kláštor - 7:30
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="widget widget_newsletter">
                            <h2 class="widget-title">Novinky</h2>
                            <div class="newsletter_form">

                                @livewire('subscribe-form', ['modelName' => 'News'])

                            </div>
                        </div>

                        <div class="row widget">
                            <div class="col-6">
                                <div class="h5 text-white text-center">Články</div>
                                <div class="d-flex d-flex align-items-center justify-content-center">
                                    <div><i class="fa-solid fa-square-rss fa-2x" aria-hidden="true"></i></div>
                                    <a class="" href="{{ route('feeds.articles-rss') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">RSS</div>
                                    </a>
                                    <a class="" href="{{ route('feeds.articles-json') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">Json</div>
                                    </a>
                                    <a class="" href="{{ route('feeds.articles-atom') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">ATOM</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="h5 text-white text-center">Oznamy</div>
                                <div class="d-flex d-flex align-items-center justify-content-center">
                                    <div><i class="fa-solid fa-square-rss fa-2x" aria-hidden="true"></i></div>
                                    <a class="" href="{{ route('feeds.notices-rss') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">RSS</div>
                                    </a>
                                    <a class="" href="{{ route('feeds.notices-json') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">Json</div>
                                    </a>
                                    <a class="" href="{{ route('feeds.notices-atom') }}" target="_blank" rel="noopener noreferrer">
                                        <div class="ms-2 link-template-gray">ATOM</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <x-web.sections.copyright />

    </footer>
<!-- FOOTER section End -->
