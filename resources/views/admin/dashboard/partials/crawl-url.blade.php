@can(
    'cache.crawl-all-url',
    'cache.crawl-search',
)
    <x-admin.dashboard-card
        color="primary"
        header="Skenovať URL"
    >
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
    </x-admin.dashboard-card>
@endcan
