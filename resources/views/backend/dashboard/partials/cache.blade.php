@can(
    'cache.data.start',
    'cache.data.stop',
    'cache.data.reset',
)
    <x-backend.dashboard-card
        color="secondary"
        header="Správa dátovej cache"
    >
        <x-backend.dashboard-button
            route="cache.data.start"
            color="success"
            icon="fas fa-play"
            text="Cache ŠTART"
        />
        <x-backend.dashboard-button
            route="cache.data.reset"
            color="warning"
            icon="fas fa-sync"
            text="Cache RESET"
        />
        <x-backend.dashboard-button
            route="cache.data.stop"
            color="danger"
            icon="fas fa-stop"
            text="Cache STOP"
        />
    </x-backend.dashboard-card>
@endcan
