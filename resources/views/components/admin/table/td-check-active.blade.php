@props([
    'check' => 1,
    'check_false_title' => null,
    'virtual' => 0
])
<td {{ $attributes }}>
    @if ($virtual == 1)
        <i class="fa-solid fa-question fa-lg text-orange"></i>
    @else
        @if ($check == 1)
            <i class="fa-solid fa-check fa-lg text-success"></i>
        @else
            <i class="fa-regular fa-times-circle fa-lg text-danger"
                @isset($check_false_title)
                    title="{{ $check_false_title }}"
                @endisset
            >
            </i>
        @endif
    @endif
</td>
