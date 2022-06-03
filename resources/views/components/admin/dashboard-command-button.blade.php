@props([
    'route' => 'admin.dashboard.commands',
    'color' => 'orange',
    'icon' => null,
    'route_parameter',
    'text'
])
<a  href="{{ route($route, ['command' => $route_parameter]) }}"
    {{ $attributes->merge(['class' => "spinner-work btn bg-gradient-$color btn-app flex-fill m-2"]) }}
>
    @isset($icon)
        <i class="{{ $icon }}"></i>
    @endisset
    {{ $text }}
</a>
