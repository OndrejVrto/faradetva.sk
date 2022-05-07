@props([
    'trashed' => null
])
<tr @if($trashed) class="table-row-trashed" @endif {{ $attributes }}>
    {{ $slot }}
</tr>
