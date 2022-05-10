<x-admin.dashboard-card
    color="teal"
    :wrap="true"
>

    <x-slot:header>
        <i class="fa-solid fa-terminal mr-2 text-teal"></i>
        Priame príkazy
    </x-slot:header>

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
    <x-admin.dashboard-button
        route="cache.crawl-all-url"
        color="indigo"
        icon="fas fa-search-dollar"
        text="Skontrolovať dostupnosť"
    />
    <x-admin.dashboard-button
        route="cache.crawl-search"
        color="purple"
        icon="fas fa-search"
        text="Scanovať pre vyhľadávanie"
    />
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
    <x-admin.dashboard-button
        route="cache.info"
        color="info"
        icon="fas fa-info-circle"
        text="PHP info"
    />
    <x-admin.dashboard-button
        route="cache.jobs.delete"
        color="danger"
        icon="far fa-trash-alt"
        text="Vymazať chybné úlohy"
    />
    <x-admin.dashboard-button
        route="cache.jobs.restart"
        color="warning"
        icon="fas fa-sync-alt"
        text="Reštartovať úlohy"
    />
    <x-admin.dashboard-button
        route="cache.testFeatures"
        color="warning"
        icon="fas fa-vial-circle-check"
        text="Testovanie novej funkcionality"
    />
</x-admin.dashboard-card>
