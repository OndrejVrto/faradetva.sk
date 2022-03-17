@props([
    'data' => [],
])
<div {{ $attributes->merge(['class' => 'my-2']) }}>
    <a  href="{{ url($data['file_url']) }}"
        class="link-template"
        title="Stiahnuť súbor: {{ $data['file_name'] }}"
        target="_blank"
        download
    >
        <i class="far fa-2x fa-{{ $data['icon'] }}"></i>
        <span class="px-2">
            {{ $data['name'].'.'.$data['file_extension'] }}
            ({{ $data['humanReadableSize'] }})
            <i class="fas fa-xs fa-download"></i>
        </span>
    </a>
</div>
