<div {{ $attributes->merge(['class' => 'my-2']) }}>
    <a  href="{{ url($attachment['file_url']) }}"
        id="Attachment_{{ $attachment['slug'] }}"
        class="link-template"
        title="Stiahnuť súbor: {{ $attachment['file_name'] }}"
        download
    >
        <i class="far fa-2x fa-{{ $attachment['icon'] }}"></i>
        <span class="px-2">
            {{ $attachment['title'] }}
            ({{ $attachment['humanReadableSize'] }})
            <i class="fas fa-xs fa-download"></i>
        </span>
    </a>
    @isset($attachment['description'])
        <label class="text-sm" for="Attachment_{{ $attachment['slug'] }}">
            {{ $attachment['description'] }}
        </label>
    @endisset

    <span class="d-none" rel="license" for="Attachment_{{ $attachment['slug'] }}">
        <x-partials.source-sentence
            :sourceArray="$attachment['sourceArr']"
        />
    </span>
</div>
