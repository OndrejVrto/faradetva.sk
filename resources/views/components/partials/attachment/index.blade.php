@foreach ($attachments as $attachment)

    <div {{ $attributes->merge(['class' => 'my-2']) }}>
        <a  href="{{ url($attachment['file_url']) }}"
            id="Attachment_{{ $attachment['slug'] }}"
            class="link-template"
            title="Stiahnuť súbor: {{ $attachment['file_name'] }}"
            download
        >
            <i class="fa-regular fa-2x fa-{{ $attachment['icon'] }}"></i>
            <span class="px-2">
                {{ $attachment['title'] }}
                ({{ $attachment['humanReadableSize'] }})
                <i class="fa-solid fa-xs fa-download"></i>
            </span>
        </a>
        @isset($attachment['source_description'])
            <label class="text-sm" for="Attachment_{{ $attachment['slug'] }}">
                {{ $attachment['source_description'] }}
            </label>
        @endisset

        <span class="d-none" rel="license" for="Attachment_{{ $attachment['slug'] }}">
            <x-partials.source-sentence
                :sourceArray="$attachment['sourceArr']"
            />
        </span>
    </div>

@endforeach
