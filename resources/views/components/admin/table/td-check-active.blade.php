@props([
    'check' => 1,
    'virtual' => 0
])
<td {{ $attributes }}>
    @if ($virtual == 1)
        <i class="fa-solid fa-question fa-lg text-orange"></i>
    @else
        @if ($check == 1)
            <i class="fa-solid fa-check fa-lg text-success"></i>
        @else
            <i class="fa-regular fa-times-circle fa-lg text-danger"></i>
        @endif
    @endif
</td>
