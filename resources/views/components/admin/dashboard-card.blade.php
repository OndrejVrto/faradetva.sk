@props([
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
    ])>
    <div class="card-header">
        <h3 class="card-title">
            {{ $header }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div @class([
        'card-body',
        'flex-wrap' => $wrap,
        'd-flex justify-content-center' => $center,
    ])>
        {{ $slot }}
    </div>
</div>
