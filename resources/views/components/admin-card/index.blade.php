@props([
    'columns' => null,
    'headerTitle' => '',
    'headerDescription' => '',
    'paginator' => null,
])
@php
    $maxXL = min($columns, 12);
    $maxLG = min($columns + 1, 12);
    $maxMD = min($columns + 2, 12);
    $linkBack = route( 'admin.dashboard' );
@endphp

<div class="row justify-content-center">

    <div {{ $attributes->merge(['class' => "col-md-".$maxMD." col-lg-".$maxLG." col-xl-".$maxXL." bg-light pt-2 px-2 px-lg-3 mb-2 rounded"]) }}>

        @if( isset($headerTitle) AND $headerTitle != '' )
            <div class="card-header text-muted border-bottom-0 pb-0 ">
                <a href="{{ $linkBack }}" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <h1>{{ $headerTitle }}</h1>
                @if( $headerDescription != '' )
                    <div class="lead">
                        {{ $headerDescription }}
                    </div>
                @endif
            </div>
        @endif

        <div class="px-3 pt-2 pb-4">
            {{ $slot }}
        </div>

        @isset($paginator)
            <!-- Paginator Start-->
            <div class="row justify-content-center pt-2">
                {!! $paginator !!}
            </div>
            <!-- Paginator end-->
        @endisset

    </div>
</div>
