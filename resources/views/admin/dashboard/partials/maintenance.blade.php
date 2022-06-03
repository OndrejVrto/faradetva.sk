<x-admin.dashboard-card
    color="danger"
>
    <x-slot:header>
        <span class="text-danger text-bold">
            <i class="fa-solid fa-person-digging mr-2"></i>
            Mód údržby
        </span>
    </x-slot:header>

    <form method="post" action="{{ route('admin.dashboard.maintenance') }}" >
        @method('PATCH')
        @csrf

        {{-- app maintenance   up - down --}}
        <x-admin.bootstrap-switch
            name="maintenance"
            label="{{ $maintenanceMode ? 'Aplikácia zastavená' : 'Aplikácia spustená' }}"
            value="{{ $maintenanceMode ? '0' : '1' }}"
        />

        <x-admin.dashboard-button-submit
            color="secondary"
            text="Uložiť a aktualizovať stav"
            class="btn-block btn-sm"
        />

    </form>

</x-admin.dashboard-card>
