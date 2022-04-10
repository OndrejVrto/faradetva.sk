@can(
    'cache.info',
    'cache.xdebug',
)
    <x-backend.dashboard-card
        color="success"
        header="Info"
    >
        <x-backend.dashboard-button
            route="cache.info"
            color="info"
            icon="fas fa-info-circle"
            text="PHP info"
        />
        <x-backend.dashboard-button
            route="cache.xdebug"
            color="success"
            icon="fas fa-info"
            text="X-DEBUG info"
        />
    </x-backend.dashboard-card>
@endcan
