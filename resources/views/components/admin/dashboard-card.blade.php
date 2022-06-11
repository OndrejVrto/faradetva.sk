@props([
    'colapse'   => false,
    'wrap'      => false,
    'center'    => false,
    'fullcolor' => false,
    'color'     => 'orange',
    'header'    => '',
])
<div @class([
        'card',
        'card-'.$color,
        'card-outline' => ! $fullcolor,
        'collapsed-card' => $colapse,
    ])>
    <div class="card-header">
        <h3 class="card-title">
            {{ $header }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                @if ($colapse)
                    <i class="fa-solid fa-plus"></i>
                @else
                    <i class="fa-solid fa-minus"></i>
                @endif
            </button>
        </div>
    </div>
    <div @class([
        'card-body',
        'd-flex flex-wrap' => $wrap,
        'justify-content-center' => $center,
    ])>
        {{ $slot }}
    </div>
</div>
