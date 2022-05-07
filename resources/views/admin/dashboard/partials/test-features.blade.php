@can(
    'cache.testFeatures',
)
    <x-admin.dashboard-card
        color="danger"
        header="Testovanie"
    >
        <x-admin.dashboard-button
            route="cache.testFeatures"
            color="warning"
            icon="fas fa-vial-circle-check"
            text="Testovanie novej funkcionality"
        />
    </x-admin.dashboard-card>
@endcan
