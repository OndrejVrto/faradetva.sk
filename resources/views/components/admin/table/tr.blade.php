@props([
    'trashed' => false,
    'prioritized' => false,
])
<tr {{ $attributes->class(['table-row-trashed' => $trashed, 'table-row-prioritized' => $prioritized]) }}>
    {{ $slot }}
</tr>
