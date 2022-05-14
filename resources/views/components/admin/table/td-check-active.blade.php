@props([
    'check' => 1,
])
<td {{ $attributes }}>
    @if ($check == 1)
        <i class="fa-solid fa-check fa-lg text-success"></i>
    @else
        <i class="fa-regular fa-times-circle fa-lg text-danger"></i>
    @endif
</td>
