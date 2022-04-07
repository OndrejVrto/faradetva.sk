<div class="col-md-6 col-lg-4">
    <div class="ministry_box fromright wow" data-wow-delay="{{ $delay }}">
        <div class="ministry_thumb">
            {!! $pageCard['responsivePicture'] !!}
            <span class="d-none" rel="license" for="Ministry_{{ $pageCard['title'] }}">
                <x-partials.source-sentence
                    :sourceArray="$pageCard['sourceArr']"
                />
            </span>
        </div>
        <div class="ministry_desc">
            <h4>{{ $pageCard['title'] }}</h4>
            <p>{{ $pageCard['teaser'] }}</p>
            <a href="{{ $pageCard['url_page'] }}" class="join_btn read_btn">Viac o spoločenstve</a>
        </div>
    </div>
</div>
