<x-web.page.section
    name="TESTIMONIAL"
    row="true"
    class="ch_testimonial_section pad_t_80"
>
    <x-web.page.section-header header="Svedectvá" />

    <div class="testimonial_crousel owl-carousel owl-theme">
        @foreach ($testimonials as $testimonial)
            <div class="item h-100">
                <div class="testimonial_box h-100 d-flex flex-column">
                    <div class="wh_bar">
                        <h3>{{ $testimonial['name'] }}</h3>
                        <h4>{{ $testimonial['function'] }}</h4>
                        </div>
                    <div class="bottom_bar">
                        <img src="{{ $testimonial['img-url'] }}"
                            class="img-fluid mb-3"
                            alt="Fotografia svedka viery: {{ $testimonial['name'] }}, {{ $testimonial['function'] }}"
                            width="120"
                            height="120"
                        />
                    </div>
                    <div class="test_paragraph text-justify">
                        {!! $testimonial['description'] !!}
                    </div>
                    @if (! empty($testimonial['url']))
                        <p class="mt-auto">
                            <a href="{{ $testimonial['url'] }}" class="link-template-light" target="_blank">
                                Celé svedectvo
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</x-web.page.section>
