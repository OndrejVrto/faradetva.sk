@can(
    'cache.info',
    'cache.xdebug',
)
    <x-admin.dashboard-card
        color="success"
        header="Info"
    >
        <x-admin.dashboard-button
            route="cache.info"
            color="info"
            icon="fas fa-info-circle"
            text="PHP info"
        />
        <x-admin.dashboard-button
            route="cache.xdebug"
            color="success"
            icon="fas fa-info"
            text="X-DEBUG info"
        />
    </x-admin.dashboard-card>
@endcan
