@foreach ($pageCards as $key => $pageCard)

    <x-partials.card-article
        :title="$pageCard['header']"
        :url="$pageCard['url']"
        :delay="$key % 3 + 1"
        :buttonText="$buttonText"
        >

        <x-slot:img>
            <img src="{{ $pageCard['img-url'] }}"
                id="picr-{{ $pageCard['id'] }}"
                class="w-100 img-fluid"
                alt="{{ $pageCard['source_description'] }}"
                width="{{ $pageCard['img-width'] }}"
                height="{{ $pageCard['img-height'] }}"
            />

            <x-partials.picture-label
                class="d-none img-article img-article-right bg-transparent"
                for="picr-{{ $pageCard['id'] }}"
            >
                @if ( ! is_null($pageCard['source_description-crop']))
                    {{ $pageCard['source_description-crop'] }}
                @else
                    {{ $pageCard['source_description'] }}
                @endif
            </x-partials.picture-label>
        </x-slot:img>

        <x-slot:teaser>
            {{ $pageCard['teaser'] }}
        </x-slot:teaser>
    </x-partials.card-article>

@endforeach
