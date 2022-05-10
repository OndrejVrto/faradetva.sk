<x-admin.dashboard-card
    color="primary"
>
    <x-slot:header>
        <i class="fa-solid fa-screwdriver-wrench mr-2 text-primary"></i>
        Nastavenia cache
    </x-slot:header>

    {{-- cache data        to Valuestore --}}
    <div class="form-group">
        <input type="checkbox" name="cache_global" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        <label for="cache_global" class="ml-3">Cache on</label>
    </div>

    {{-- cache response    to Valuestore --}}
    <div class="form-group">
        <input type="checkbox" name="cache_response" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        <label for="cache_response" class="ml-3">Cache response</label>
    </div>

    <hr class="bg-orange">

    {{-- cache route       route:cache - route:clear --}}
    <div class="form-group">
        <input type="checkbox" name="cache_route" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        <label for="cache_route" class="ml-3">Route cache</label>
    </div>

    {{-- cache config      config:cache - config:clear --}}
    <div class="form-group">
        <input type="checkbox" name="cache_config" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        <label for="cache_config" class="ml-3">Config cache</label>
    </div>

    {{-- cache events      event:cache - event:clear --}}
    <div class="form-group mb-0">
        <input type="checkbox" name="cache_event" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        <label for="cache_event" class="ml-3">Event cache</label>
    </div>

</x-admin.dashboard-card>
