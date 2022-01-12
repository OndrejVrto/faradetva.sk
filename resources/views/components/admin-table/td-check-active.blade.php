@props([
    'check' => 1,
])
<td>
    @if ($check == 1)
        <i class="fas fa-check fa-lg text-success"></i>
    @else
        <i class="far fa-times-circle fa-lg text-danger"></i>
    @endif
</td>
