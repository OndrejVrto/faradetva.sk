@can(
    'cache.start',
    'cache.stop',
    'cache.reset',
)
    <x-admin.dashboard-card
        color="orange"
        header="Optimize"
    >
        <x-admin.dashboard-button
            route="cache.start"
            color="success"
            icon="fas fa-play"
            text="ŠTART"
        />
        <x-admin.dashboard-button
            route="cache.reset"
            color="warning"
            icon="fas fa-sync"
            text="RESET"
        />
        <x-admin.dashboard-button
            route="cache.stop"
            color="danger"
            icon="fas fa-stop"
            text="STOP"
        />
    </x-admin.dashboard-card>
@endcan
