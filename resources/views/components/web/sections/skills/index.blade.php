@push('js')
        {{-- <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/plugins/counter/jquery.countTo.js', true) }}" crossorigin="anonymous"></script> --}}
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js" crossorigin="anonymous"></script>
@endpush

<x-web.page.section
    name="SKILLS"
    row="true"
    class="ch_skills_section pad_t_80 wh_pad_b_80"
>

    <div class="col-sm-6 col-lg-3">
        <div class="counter_box">
            <i class="fa-solid fa-book wh_fa" aria-hidden="true"></i>
            <h1 class="counter_num" data-to="{{ $skills['news'] }}" data-delay="100" data-speed="4000">
                {{ $skills['news'] }}
            </h1>
            <p>{{ trans_choice('messages.Clanok', $skills['news']) }}</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="counter_box zoom wow" data-wow-delay=".3s">
            <i class="fa-solid fa-people-arrows-left-right wh_fa" aria-hidden="true"></i>
            <h1 class="counter_num" data-to="{{ $skills['testimonials'] }}" data-delay="100" data-speed="4000">
                {{ $skills['testimonials'] }}
            </h1>
            <p>{{ trans_choice('messages.Svedectvo', $skills['testimonials']) }}</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="counter_box zoom wow" data-wow-delay=".6s">
            <i class="fa-solid fa-users wh_fa" aria-hidden="true"></i>
            <h1 class="counter_num" data-to="{{ $skills['subscribers'] }}" data-delay="100" data-speed="4000">
                {{ $skills['subscribers'] }}
            </h1>
            <p>{{ trans_choice('messages.Odberatel', $skills['subscribers']) }}</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="counter_box zoom wow" data-wow-delay=".9s">
            <i class="fa-solid fa-paper-plane wh_fa" aria-hidden="true"></i>
            <h1 class="counter_num" data-to="{{ $skills['notices'] }}" data-delay="100" data-speed="4000">
                {{ $skills['notices'] }}
            </h1>
            <p>{{ trans_choice('messages.Oznam', $skills['notices']) }}</p>
        </div>
    </div>

</x-web.page.section>
