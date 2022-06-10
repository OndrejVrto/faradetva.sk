<x-admin.dashboard-card
    color="danger"
>
    <x-slot:header>
        <span class="text-danger text-bold">
            <i class="fa-solid fa-person-digging mr-2"></i>
            Vývoj a údržba
        </span>
    </x-slot:header>

    <form method="post" action="{{ route('admin.dashboard.maintenance') }}" >
        @method('PATCH')
        @csrf

        <div class="row d-flex justify-content-center">

            {{-- app maintenance   up - down --}}
            <x-admin.bootstrap-switch
                name="maintenance_mode"
                label="Mód údržby"
                value="{{ $maintenanceMode ? '1' : '0' }}"
                off_color="success"
                on_color="danger"
            />

        </div>

        <hr class="bg-primary mt-0 mb-4">

        <div class="row">
            <div class="col-xl-6">

                {{-- APP_ENV= local/production --}}
                <x-admin.bootstrap-switch
                    name="app_enviroment_mode"
                    label="{{ $valueStore->get('ADMIN.app_enviroment_mode') ? 'Local' : 'Production' }}"
                    value="{{ $valueStore->get('ADMIN.app_enviroment_mode') ? '1' : '0' }}"
                    off_color="success"
                    on_color="danger"
                />

                {{-- APP_DEBUG --}}
                <x-admin.bootstrap-switch
                    name="app_debug"
                    label="Debug"
                    value="{{ $valueStore->get('ADMIN.app_debug') ? '1' : '0' }}"
                    off_color="success"
                    on_color="danger"
                />

            </div>
            <div class="col-xl-6">
                <hr class="bg-primary d-xl-none mt-3">

                {{-- QUERY_LOG --}}
                <x-admin.bootstrap-switch
                    name="app_query_log"
                    label="Query loging"
                    value="{{ $valueStore->get('ADMIN.app_query_log') ? '1' : '0' }}"
                    off_color="success"
                    on_color="danger"
                />

                {{-- QUERY_DETECTOR_ENABLED --}}
                <x-admin.bootstrap-switch
                    name="app_query_detector"
                    label="Query detector"
                    value="{{ $valueStore->get('ADMIN.app_query_detector') ? '1' : '0' }}"
                    off_color="success"
                    on_color="danger"
                />

            </div>
        </div>


        <x-admin.dashboard-button-submit
            color="danger"
            text="Uložiť a aktualizovať stav"
            class="btn-block"
        />

    </form>

</x-admin.dashboard-card>
