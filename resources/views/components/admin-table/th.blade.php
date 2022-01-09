@props([
    'colspan' => null,
    'width' => null,
])
<th
    scope="col"
    @isset($colspan)colspan="{{ $colspan }}"@endisset
    @isset($width)width="{{ $width }}"@endisset
    {{ $attributes }}
>
    {{ $slot }}
</th>
