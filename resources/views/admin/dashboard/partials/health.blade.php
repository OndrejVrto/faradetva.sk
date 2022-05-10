<div class="card card-outline card-orange">
    <div class="card-header">
        <h3 class="card-title">
            <x-health-logo height="20" class="text-danger"/>
            {{ __('health::notifications.laravel_health') }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>

    </div>

    <div class="card-body">
        @if (count($checkResults?->storedCheckResults ?? []))

            <div class="d-flex flex-wrap justify-content-center justify-content-md-between align-content-end mx-2">
                @if ($lastRanAt)
                    <span class="text-bold align-self-center mx-5 ml-sm-0 {{ $lastRanAt->diffInMinutes() > 5 ? ' text-danger' : '' }}">
                        {{ __('health::notifications.check_results_from') }} {{ $lastRanAt->diffForHumans() }}
                    </span>
                @endif
                <a class="btn btn-flat bg-gradient-pink flex-fill flex-md-grow-0 mb-2 mb-md-0"
                    href="{{ route('admin.dashboard', [ 'fresh']) }}">
                    Vynútiť obnovenie stavu
                </a>
            </div>

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
                                        {!! __(($result->shortSummary)) !!}
                                    @endif
                                </span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
