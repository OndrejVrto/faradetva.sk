<!-- COOKIE Start -->
    <div class="js-cookie-consent fixed-bottom bg-dark text-center py-4" role="alert">
        <h4 class="alert-heading text-church-template">
            <i class="fas fa-fw fa-cookie-bite me-2"></i>
            Cookies
        </h4>

        <!-- Cookie Message -->
        <p class="text-white col-8 mx-auto fs-6">
            {{ __('cookie-consent::texts.message') }}
        </p>

        {{-- <!-- Btn: Info Cookies --> --}}
        {{-- Add link to cookie info if is needed--}}
        {{-- <a class="submit_btn read_btn_blue mx-2" href="#">
            {{ __('cookie-consent::texts.info') }}
        </a> --}}

        <!-- Btn: Accept Cookies -->
        <a class="js-cookie-consent-agree read_btn" title="{{ __('cookie-consent::texts.agree') }}">
            {{ __('cookie-consent::texts.agree') }}
        </a>
    </div>
<!-- COOKIE End -->
