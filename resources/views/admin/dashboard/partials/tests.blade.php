<x-admin.dashboard-card
    color="warning"
    :wrap="true"
>

    <x-slot:header>
        <i class="fa-solid fa-terminal mr-2 text-warning"></i>
        Testovanie
    </x-slot:header>

    <x-admin.dashboard-command-button
        route_parameter="testFeatures"
        color="warning"
        icon="fas fa-vial-circle-check"
        text="Testovanie novej funkcionality"
    />

</x-admin.dashboard-card>
