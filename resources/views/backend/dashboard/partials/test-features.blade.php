@can(
    'cache.testFeatures',
)
    <x-backend.dashboard-card
        color="danger"
        header="Testovanie"
    >
        <x-backend.dashboard-button
            route="cache.testFeatures"
            color="warning"
            icon="fas fa-vial-circle-check"
            text="Testovanie novej funkcionality"
        />
    </x-backend.dashboard-card>
@endcan
