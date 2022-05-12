<x-admin.dashboard-card
    color="primary"
>
    <x-slot:header>
        <i class="fa-solid fa-screwdriver-wrench mr-2 text-primary"></i>
        Nastavenia cache
    </x-slot:header>

    <div class="row">
        <div class="col-xl-6">
            {{-- cache data        to Valuestore --}}
            <div class="form-group">
                <input type="checkbox" name="cache_global" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cache_global" class="ml-2">Global</label>
            </div>

            {{-- cache response    to Valuestore --}}
            <div class="form-group">
                <input type="checkbox" name="cache_response" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cache_response" class="ml-2">Response</label>
            </div>

            {{-- cookie    COOKIE_CONSENT_ENABLED --}}
            <div class="form-group  mb-0">
                <input type="checkbox" name="cookie" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cookie" class="ml-2">Cookie</label>
            </div>
        </div>
        <div class="col-xl-6">
            <hr class="bg-primary d-xl-none mt-3">

            {{-- cache route       route:cache - route:clear --}}
            <div class="form-group">
                <input type="checkbox" name="cache_route" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cache_route" class="ml-2">Route</label>
            </div>

            {{-- cache config      config:cache - config:clear --}}
            <div class="form-group">
                <input type="checkbox" name="cache_config" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cache_config" class="ml-2">Config</label>
            </div>

            {{-- cache events      event:cache - event:clear --}}
            <div class="form-group mb-0">
                <input type="checkbox" name="cache_event" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                <label for="cache_event" class="ml-2">Event</label>
            </div>
        </div>
    </div>

</x-admin.dashboard-card>
