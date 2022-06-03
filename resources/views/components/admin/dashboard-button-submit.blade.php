@props([
    'color' => 'orange',
    'text' => '',
    'icon' => null,
])
<button
    type="submit"
    {{ $attributes->merge(['class' => "spinner-work btn btn-flat bg-gradient-$color flex-fill flex-md-grow-0 mb-2 mb-md-0"]) }}
>
    @isset($icon)
        <i class="{{ $icon }} mr-2"></i>
    @endisset
    {{ $text }}
</button>
