<!-- FOOTER section Start -->
    <footer class="footer_section">
        <div class="footer_main_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="widget widget_text">
                            <div class="text_widget">
                                <div class="ftr_logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ URL::asset('images/church_logo.png') }}" alt="logo">
                                    </a>
                                </div>

                                <x-partials.day-idea />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="widget widget_social">
                            <h2 class="widget-title">Spájajme sa</h2>
                            <ul class="footer_social">
                                <li class="facebook">
                                    <a href="#"><i class="fab fa-lg fa-facebook"></i></a>
                                    <p>150<br>páčikov</p>
                                </li>
                                <li class="g_plus">
                                    <a href="#"><i class="fab fa-lg fa-google-plus"></i></a>
                                    <p>250<br>folowerov</p>
                                </li>
                                <li class="twitter">
                                    <a href="#"><i class="fab fa-lg fa-twitter"></i></a>
                                    <p>300<br>foloverov</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="widget widget_newsletter">
                            <h2 class="widget-title">Novinky</h2>
                            <div class="newsletter_form">

                                @livewire('subscribe-form', ['modelName' => 'News'])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-frontend.sections.copyright />

    </footer>
<!-- FOOTER section End -->
