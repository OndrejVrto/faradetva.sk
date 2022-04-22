<div class="row" data-masonry='{"percentPosition": true }'>

    @foreach ($pageCards as $pageCard)

        <div class="col-md-6 col-lg-4">
            <div class="ministry_box fromright wow" data-wow-delay="{{ 0.2 * $loop->iteration }}">
                <div class="ministry_thumb">

                    {{-- {!! $pageCard['responsivePicture'] !!} --}}
                    <img src="{{ $pageCard['img-section-list'] }}"
                        class="img-fluid"
                        alt="{{ $pageCard['img-description'] }}"
                        height="{{ $pageCard['img-height'] }}"
                        width="{{ $pageCard['img-width'] }}"
                    />

                    <span class="d-none" rel="license" for="Ministry_{{ $pageCard['title'] }}">
                        <x-partials.source-sentence
                            :sourceArray="$pageCard['sourceArr']"
                        />
                    </span>
                </div>
                <div class="ministry_desc">
                    <h4>{{ $pageCard['title'] }}</h4>
                    <p>{{ $pageCard['teaser'] }}</p>
                    <a href="{{ $pageCard['url'] }}" class="join_btn read_btn">Viac o spoločenstve</a>
                </div>
            </div>
        </div>

    @endforeach
</div>
