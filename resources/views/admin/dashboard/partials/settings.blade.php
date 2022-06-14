<x-admin.dashboard-card
    color="primary"
>
    <x-slot:header>
        <i class="fa-solid fa-screwdriver-wrench mr-2 text-primary"></i>
        Nastavenia
    </x-slot:header>

    <form method="post" action="{{ route('admin.dashboard.settings') }}" >
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col-xl-6">
                {{-- cache data        to Valuestore --}}
                <x-admin.bootstrap-switch
                    name="cache_global"
                    label="Global cache"
                />

                {{-- cache response    to Valuestore --}}
                <x-admin.bootstrap-switch
                    name="cache_response"
                    label="Response cache"
                />

                {{-- cookie    COOKIE_CONSENT_ENABLED --}}
                <x-admin.bootstrap-switch
                    name="cookie"
                    label="Cookie message"
                />

                {{-- CSP_ENABLED --}}
                <x-admin.bootstrap-switch
                    name="content_security_policy"
                    label="CSP"
                />

            </div>
            <div class="col-xl-6">
                <hr class="bg-primary d-xl-none mt-3">

                {{-- cache route       route:cache - route:clear --}}
                <x-admin.bootstrap-switch
                    name="cache_route"
                    label="Route cache"
                />

                {{-- cache config      config:cache - config:clear --}}
                <x-admin.bootstrap-switch
                    name="cache_config"
                    label="Config cache"
                />

                {{-- cache events      event:cache - event:clear --}}
                <x-admin.bootstrap-switch
                    name="cache_event"
                    label="Event cache"
                />

                {{-- google font inline       GOOGLE --}}
                <x-admin.bootstrap-switch
                    name="cache_google_font"
                    label="Google font cache"
                />

            </div>
        </div>


        <x-admin.dashboard-button-submit
            color="orange"
            text="Uložiť a aktualizovať stav"
            class="btn-block"
        />

    </form>

</x-admin.dashboard-card>
