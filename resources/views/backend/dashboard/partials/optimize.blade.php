@can(
    'cache.start',
    'cache.stop',
    'cache.reset',
)
    <x-backend.dashboard-card
        color="orange"
        header="Optimize"
    >
        <x-backend.dashboard-button
            route="cache.start"
            color="success"
            icon="fas fa-play"
            text="ŠTART"
        />
        <x-backend.dashboard-button
            route="cache.reset"
            color="warning"
            icon="fas fa-sync"
            text="RESET"
        />
        <x-backend.dashboard-button
            route="cache.stop"
            color="danger"
            icon="fas fa-stop"
            text="STOP"
        />
    </x-backend.dashboard-card>
@endcan
