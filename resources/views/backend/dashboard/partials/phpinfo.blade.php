@can(
    'cache.info',
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
    </x-backend.dashboard-card>
@endcan
