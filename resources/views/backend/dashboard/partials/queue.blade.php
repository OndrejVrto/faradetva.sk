@can(
    'cache.jobs.delete',
    'cache.jobs.restart',
)
    <x-backend.dashboard-card
        color="yellow"
        header="Správa Queue"
    >
        <x-backend.dashboard-button
            route="cache.jobs.delete"
            color="danger"
            icon="far fa-trash-alt"
            text="Vymazať chybné úlohy"
        />
        <x-backend.dashboard-button
            route="cache.jobs.restart"
            color="warning"
            icon="fas fa-sync-alt"
            text="Reštartovať úlohy"
        />
    </x-backend.dashboard-card>
@endcan
