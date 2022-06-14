<x-admin.dashboard-card
    color="teal"
    :wrap="true"
>

    <x-slot:header>
        <i class="fa-solid fa-terminal mr-2 text-teal"></i>
        Príkazy Artisan
    </x-slot:header>

    <x-admin.dashboard-command-button
        route_parameter="crawl_url"
        color="indigo"
        icon="fas fa-search-dollar"
        text="Skontrolovať dostupnosť"
    />
    <x-admin.dashboard-command-button
        route_parameter="crawl_search"
        color="primary"
        icon="fas fa-search"
        text="Scanovať pre vyhľadávanie"
    />
    <x-admin.dashboard-command-button
        route_parameter="crawl_sitemap"
        color="purple"
        icon="fas fa-magnifying-glass-arrow-right"
        text="Scanovať pre sitemap"
    />
    <x-admin.dashboard-command-button
        route_parameter="cache_reset"
        color="orange"
        icon="fas fa-sync"
        text="Cache RESET"
    />
    <x-admin.dashboard-command-button
        route_parameter="cache_data_reset"
        color="success"
        icon="fas fa-sync"
        text="Cache Data RESET"
    />
    <x-admin.dashboard-command-button
        route_parameter="failed_jobs_delete"
        color="danger"
        icon="far fa-trash-alt"
        text="Vymazať chybné úlohy"
    />
    <x-admin.dashboard-command-button
        route_parameter="jobs_restart"
        color="pink"
        icon="fas fa-sync-alt"
        text="Reštartovať úlohy"
    />
    <x-admin.dashboard-command-button
        route_parameter="clean_directories"
        color="secondary"
        icon="fas fa-trash"
        text="Vymazať TEMP"
    />
    <x-admin.dashboard-command-button
        route_parameter="php_info"
        color="info"
        icon="fas fa-info-circle"
        text="PHP info"
    />
</x-admin.dashboard-card>
