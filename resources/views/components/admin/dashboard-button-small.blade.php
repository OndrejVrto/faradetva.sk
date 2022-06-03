@props([
    'route' => '',
    'color' => 'orange',
    'text' => '',
    'icon' => '',
])
@can($route)
    <a  href="{{ route($route) }}"
        class="spinner-work btn btn-flat bg-gradient-{{$color}} flex-fill flex-md-grow-0 mb-2 mb-md-0">
            <i class="{{ $icon }} mr-2"></i>
            {{ $text }}
    </a>
@endcan
