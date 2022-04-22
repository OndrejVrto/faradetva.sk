<x-frontend.page.section
    name="PASTERS"
    row="true"
    class="ch_pasters_section pad_t_80"
>
    <x-frontend.page.section-header header="Naši kňazi" />

    @foreach ($priests as $priest)
        <div class="col-xl-4 col-md-6 col-12 mx-auto">
            <div class="ministry_box pastor_box flipinY wow">
                <div class="ministry_thumb">
                    <img src="{{ $priest['img-url'] }}"
                        class="img-fluid"
                        alt="Fotografia: {{ $priest['full_name_titles'] }}, {{ $priest['function'] }}"
                        height="{{ $priest['img-height'] }}"
                        width="{{ $priest['img-width'] }}"
                    />
                </div>
                <div class="ministry_desc">
                    <h4>{{ $priest['full_name_titles'] }}</h4>
                    <h5>{{ $priest['function'] }}</h5>
                    @isset($priest['phone'])
                        <div class="mb-2">
                            <a class="link-secondary" href="tel:{{ $priest['phone_digits'] }}">
                                <i class="fas fa-phone-alt pe-2"></i>
                                {{ $priest['phone'] }}
                            </a>
                        </div>
                    @endisset
                    @isset($priest['email'])
                        <div class="mt-0 mb-2">
                            <a class="link-secondary" href="email:{{ $priest['email'] }}">
                                <i class="far fa-paper-plane fa-flip-horizontal ps-2"></i>
                                {{ $priest['email'] }}
                            </a>
                        </div>
                    @endisset
                    <p>{!! $priest['description'] !!}</p>
                </div>
            </div>
        </div>
    @endforeach

</x-frontend.page.section>
