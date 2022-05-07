@can(
    'cache.jobs.delete',
    'cache.jobs.restart',
)
    <x-admin.dashboard-card
        color="yellow"
        header="Správa Queue"
    >
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
    </x-admin.dashboard-card>
@endcan
