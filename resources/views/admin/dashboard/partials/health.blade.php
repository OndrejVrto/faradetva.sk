<x-admin.dashboard-card
    color="orange"
>
    <x-slot:header>
        <x-health-logo height="20" class="text-danger"/>
        {{ __('health::notifications.laravel_health') }}
    </x-slot:header>


    <div class="d-flex flex-wrap justify-content-center justify-content-md-between align-content-end mx-2">
        @if ($lastRanAt)
            <span class="text-bold align-self-center mx-5 ml-sm-0 {{ $lastRanAt->diffInMinutes() > 5 ? ' text-danger' : '' }}">
                {{ __('health::notifications.check_results_from') }} {{ $lastRanAt->diffForHumans() }}
            </span>
        @endif

        @can('admin.dashboard.health-fresh')
            <x-admin.dashboard-button-small
                route="admin.dashboard.health-fresh"
                color="pink"
                icon="fas fa-sync-alt"
                text="Obnoviť"
            />
        @endcan
    </div>

    @if (count($checkResults?->storedCheckResults ?? []))

        <div class="d-flex flex-wrap">
            @foreach ($checkResults->storedCheckResults as $result)
                <div class="col-lg-6 my-2">
                    <div class="info-box shadow h-100">
                        <span class="info-box-icon">
                            <x-partials.health-status-icon :result="$result" height="40"/>
                        </span>
                        <div class="info-box-content justify-content-start">
                            <span class="info-box-text text-bold">{{ __(($result->label)) }}</span>
                            <span class="mt-1 font-weight-normal lh-sm">
                                @if (!empty($result->notificationMessage))
                                    {!! __($result->notificationMessage, $result->meta) !!}
                                @else
                                    {!! __($result->shortSummary, $result->meta) !!}
                                @endif
                            </span>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</x-admin.dashboard-card>
