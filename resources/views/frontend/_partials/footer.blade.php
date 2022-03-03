<!-- Footer section Start -->
<div class="footer_section">
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
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
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
                            <form>
                                @csrf
                                <input type="text" name="n_name" placeholder="Vaše celé meno">
                                <input type="email" name="n_email" placeholder="Váš E-mail">
                                <button type="submit" class="news_btn read_btn">Zaregistrovať <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend._partials.copyright')
</div>
<!-- Footer section End -->
