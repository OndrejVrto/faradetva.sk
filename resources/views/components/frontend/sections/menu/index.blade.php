<!-- MENU section start -->
    <div class="section header_menu_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="ch_logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/church_logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="nav_toggle" id="nav_toggle">
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
                    <div class="header_right_menu" id="header_right_menu">
                        <ul class="menu">

                            <x-frontend.sections.menu.items />

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- MENU section end -->
