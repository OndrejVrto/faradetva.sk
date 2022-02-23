@if(!$source == null OR !$author == null OR !$license == null)
    <div rel="license" {{ $attributes->merge(['class' => 'source ']) }}>
        @isset($source)
            Zdroj
            @isset($source_url)
                <a href="{{ url($source_url) }}" target="_blank" rel="noopener noreferrer" class="link-template">
            @endisset
                    <span class="px-1 @unless($source_url)text-church-template-blue @endunless">{{ $source }}</span>
            @isset($source_url)
                </a>
            @endisset
        @endisset

        @isset($author)
            od autora
            @isset($author_url)
                <a href="{{ url($author_url) }}" target="_blank" rel="noopener noreferrer" class="link-template">
            @endisset
                <span class="px-1 @unless($author_url)text-church-template-blue @endunless">{{ $author }}</span>
            @isset($author_url)
                </a>
            @endisset
        @endisset

        @if($sourceSmall != "true")
            @isset($license)
                licencované podľa
                @isset($license_url)
                    <a href="{{ $license_url }}" target="_blank" rel="noopener noreferrer license" class="link-template">
                @endisset
                    <span class="ps-1 @unless($license_url)text-church-template-blue @endunless">{{ $license }}</span>
                @isset($license_url)
                    </a>
                @endisset
            @endisset
        @endif
    </div>
@endif

