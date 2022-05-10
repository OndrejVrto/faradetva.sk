<div class="mx-2 my-1">
    @if(count($checkResults?->storedCheckResults ?? []))
        <div class="w-full max-w-120 mb-1 py-1 text-white bg-blue-800">
            <span class="px-2 text-left w-1/2">Laravel Health Check Results</span>
            <span class="px-2 text-right w-1/2">
                Last ran all the checks
                @if ($lastRanAt->diffInMinutes() < 1)
                    just now
                @else
                    {{ $lastRanAt->locale('en')->diffForHumans() }}
                @endif
            </span>
        </div>
        @foreach ($checkResults->storedCheckResults as $result)
            <div class="space-x-1">
                <span class="w-10">
                    <b class="uppercase {{ $color($result->status) }}">
                        {{ $result->status }}
                    </b>
                </span>
                <span>{{ str(__($result->label, $result->meta, 'en'))->replace('<br>', '') }}</span>
                <span class="text-gray">›</span>
                <span class="{{ $color($result->status) }}"> {{ str(__($result->shortSummary, $result->meta, 'en'))->replace('<br>', '') }}</span>
            </div>
            @if ($result->notificationMessage)
            <div class="ml-11 text-gray">
                ⇂ {{ str(__($result->notificationMessage, $result->meta, 'en'))->replace('<br>', '') }}
            </div>
            @endif
        @endforeach
    @else
        <div>
            No checks have run yet...<br />
            Please execute this command:
            <br /><br />
            <b>php artisan health:check</b>
        </div>
    @endif
</div>
