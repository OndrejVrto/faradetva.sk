@props([
    'flex' => 'true',
    'color' => 'orange',
    'header' => '',
])
<div class="card card-{{ $color }}">
    <div class="card-header">
        <h3 class="card-title">
            {{ $header }}
        </h3>
    </div>
    <div class="card-body justify-content-center @if($flex==='true') d-flex flex-wrap @endif">
        {{ $slot }}
    </div>
</div>
