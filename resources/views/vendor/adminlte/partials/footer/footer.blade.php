<footer class="main-footer">
    @hasSection('content_breadcrumb')
        <div class="d-md-flex justify-content-md-between align-content-center">
            <div>
                @yield('content_breadcrumb')
            </div>
            <div class="text-center">
                @yield('footer')
            </div>
        </div>
    @else
        <div class="d-md-flex justify-content-end align-content-center">
            @yield('footer')
        </div>
    @endif
</footer>
