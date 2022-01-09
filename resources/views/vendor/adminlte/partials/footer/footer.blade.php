<footer class="main-footer">
    @hasSection('content_breadcrumb')
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-start">
                @yield('content_breadcrumb')
            </div>
            <div class="col-lg-6">
                @yield('footer')
            </div>
        </div>
    @else
        @yield('footer')
    @endif
</footer>
