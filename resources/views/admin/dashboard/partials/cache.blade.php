@can(
    'cache.data.start',
    'cache.data.stop',
    'cache.data.reset',
)
    <x-admin.dashboard-card
        color="secondary"
        header="Správa dátovej cache"
    >
        <x-admin.dashboard-button
            route="cache.data.start"
            color="success"
            icon="fas fa-play"
            text="Cache ŠTART"
        />
        <x-admin.dashboard-button
            route="cache.data.reset"
            color="warning"
            icon="fas fa-sync"
            text="Cache RESET"
        />
        <x-admin.dashboard-button
            route="cache.data.stop"
            color="danger"
            icon="fas fa-stop"
            text="Cache STOP"
        />
    </x-admin.dashboard-card>
@endcan
