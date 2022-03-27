@can(
    'cache.crawl-all-url',
)
    <x-backend.dashboard-card
        color="primary"
        header="Skenovať URL"
    >
        <x-backend.dashboard-button
            route="cache.crawl-all-url"
            color="indigo"
            icon="fas fa-search-dollar"
            text="Scanovať všetky URL"
        />
    </x-backend.dashboard-card>
@endcan
