@section('content_header')
    {{ __('health::notifications.laravel_health') }}
@endsection

@if (count($checkResults?->storedCheckResults ?? []))

    @if ($lastRanAt)
        <h5 class="{{ $lastRanAt->diffInMinutes() > 5 ? 'text-danger' : '' }}">
            <x-health-logo height="20" class="text-orange"/>
            {{ __('health::notifications.check_results_from') }} {{ $lastRanAt->diffForHumans() }}
            <x-health-logo height="20" class="text-orange"/>
        </h5>
    @endif

    <div class="d-flex flex-wrap">
        @foreach ($checkResults->storedCheckResults as $result)
            <div class="col-md-6 col-xl-4 my-2">

                <div class="info-box shadow h-100">
                    <span class="info-box-icon">
                        <x-partials.health-status-icon :result="$result" height="45"/>
                    </span>
                    <div class="info-box-content justify-content-start">
                        <span class="info-box-text text-bold">{{ __(($result->label)) }}</span>
                        <span class="mt-1 font-weight-normal lh-sm">
                            @if (!empty($result->notificationMessage))
                                {{ __($result->notificationMessage, $result->meta) }}
                            @else
                                {{ __(($result->shortSummary)) }}
                            @endif
                        </span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endif
