@can(
    'cache.crawl-all-url',
    'cache.crawl-search',
)
    <x-backend.dashboard-card
        color="primary"
        header="Skenovať URL"
    >
        <x-backend.dashboard-button
            route="cache.crawl-all-url"
            color="indigo"
            icon="fas fa-search-dollar"
            text="Skontrolovať dostupnosť"
        />
        <x-backend.dashboard-button
            route="cache.crawl-search"
            color="purple"
            icon="fas fa-search"
            text="Scanovať pre vyhľadávanie"
        />
    </x-backend.dashboard-card>
@endcan
