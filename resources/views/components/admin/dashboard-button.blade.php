@props([
    'route' => '',
    'color' => 'orange',
    'text' => '',
    'icon' => '',
])
@can($route)
    <a  href="{{ route($route) }}"
        class="btn bg-gradient-{{$color}} btn-app flex-fill m-2">
            <i class="{{ $icon }}"></i>
            {{ $text }}
    </a>
@endcan
