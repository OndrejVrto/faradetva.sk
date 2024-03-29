<x-web.page.section
    name="PASTERS"
    {{-- row="true" --}}
    class="ch_pasters_section pad_t_50 pad_b_50"
>
    <x-web.page.section-header header="Naši kňazi" class="mb-0" />

    <div class="row pad_b_30">
        @foreach ($priests as $priest)
            <div class="col-xl-4 col-md-6 col-12 mar_t_100">
                <div class="ministry_box pastor_box flipinY wow h-100 my-0 d-flex flex-column pb-2">
                    <figure class="ministry_thumb">
                        <img src="{{ $priest['img-url'] }}"
                            class="img-fluid"
                            alt="Fotografia: {{ $priest['full_name_titles'] }}, {{ $priest['function'] }}"
                            height="{{ $priest['img-height'] }}"
                            width="{{ $priest['img-width'] }}"
                        />
                    </figure>
                    <div class="ministry_desc h-100 d-flex flex-column">
                        <h4>{{ $priest['full_name_titles'] }}</h4>
                        <h5>{{ $priest['function'] }}</h5>

                        @isset($priest['phone'])
                            <div class="mb-2">
                                <a class="link-secondary" href="tel:{{ $priest['phone_digits'] }}">
                                    <i class="fa-solid fa-phone-alt pe-2"></i>
                                    {{ $priest['phone'] }}
                                </a>
                            </div>
                        @endisset

                        @isset($priest['email'])
                            <div class="mt-0 mb-2">
                                <x-partials.email-link
                                    email="{{ $priest['email'] }}"
                                    nonce="{{ csp_nonce() }}"
                                />
                            </div>
                        @endisset

                        <div class="mt-3">
                            @isset($priest['personal_url'])
                                <a  class="tt px-2 link-secondary"
                                    href="{{ $priest['personal_url'] }}"
                                    data-bs-placement="bottom"
                                    title="{{ $priest['personal_url'] }}"
                                >
                                    <i class="fa-solid fa-link fa-lg"></i>
                                </a>
                            @endisset
                            @isset($priest['facebook'])
                                <a  class="tt px-2 link-secondary"
                                    href="{{ $priest['facebook'] }}"
                                    data-bs-placement="bottom"
                                    title="{{ $priest['facebook'] }}"
                                >
                                    <i class="fa-brands fa-facebook fa-lg"></i>
                                </a>
                            @endisset
                            @isset($priest['twitter'])
                                    <a  class="tt px-2 link-secondary"
                                        href="{{ $priest['twitter'] }}"
                                        data-bs-placement="bottom"
                                        title="{{ $priest['twitter'] }}"
                                    >
                                        <i class="fa-brands fa-twitter fa-lg"></i>
                                    </a>
                                </span>
                            @endisset
                        </div>

                        <p>{!! $priest['description'] !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-web.page.section>
