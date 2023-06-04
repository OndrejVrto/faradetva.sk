<!-- COPY-RIGHT section Start -->
    <div class="ch_bottom_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="copyright_text h-100 d-flex align-items-center justify-content-center justify-content-lg-start">
                        <p>
                            Copyright © 2022-{{ now()->year }}, Všetky práva vyhradené <a href="{{ secure_url('kontakty') }}">Farnosť Detva</a>.
                            <span class="ms-2">Created by <a href="https://ondrejvrto.eu/">Ondrej Vrťo</a>.</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="float-lg-end d-flex justify-content-center mt-4 mt-lg-0">
                        @guest
                            <a class="btn btn-sm btn-outline-secondary rounded-pill" href="{{ route('login') }}" rel="nofollow">
                                Prihlásiť
                            </a>
                        @else
                            <a class="btn btn-sm btn-outline-warning rounded-pill" href="{{ route('admin.dashboard') }}">
                                Administrácia
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="ms-2 btn btn-sm btn-outline-danger rounded-pill" type="submit">
                                    Odhlásiť
                                </button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- COPY-RIGHT section End -->
